// Data akan diinject dari PHP
let PRODUCTS = [];
let ORDERS = [];

// Initialize data from PHP
function initData(products, orders) {
  PRODUCTS = products || [];
  ORDERS = orders || [];
  renderOrders();
  renderProducts();
}

/* Toast */
function showToast(msg, type = 'success') {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.className = `toast ${type}`;
  requestAnimationFrame(() => { 
    t.style.opacity = '1'; 
    t.style.transform = 'none'; 
  });
  clearTimeout(t._timer);
  t._timer = setTimeout(() => {
    t.style.opacity = '0';
    t.style.transform = 'translateY(8px)';
  }, 2500);
}

/* Helpers */
const statusBadge = s =>
  `<span class="badge ${s}">${s.charAt(0).toUpperCase() + s.slice(1)}</span>`;
const fmt = n => Number(n).toLocaleString('id-ID');

/* Tab switching */
function switchTab(tab) {
  document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(b => b.classList.remove('active'));
  document.getElementById('panel-' + tab).classList.add('active');
  const btns = document.querySelectorAll('.nav-item');
  if (tab === 'orders') { 
    btns[0].classList.add('active'); 
    document.getElementById('page-title').textContent = 'Orders'; 
  }
  if (tab === 'products') { 
    btns[1].classList.add('active'); 
    document.getElementById('page-title').textContent = 'Products'; 
  }
}

/* ORDERS */
function renderOrders() {
  const q = document.getElementById('order-search').value.toLowerCase();
  const fil = document.getElementById('order-filter').value;
  const rows = ORDERS.filter(o =>
    (!fil || o.status === fil) &&
    (!q || o.order_no.toLowerCase().includes(q) || (o.username || '').toLowerCase().includes(q))
  );
  const tbody = document.getElementById('orders-tbody');
  if (!rows.length) {
    tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">No orders found</td></tr>`;
    return;
  }
  tbody.innerHTML = rows.map(o => `
    <tr id="order-row-${o.id}">
      <td><button class="toggle-btn" onclick="toggleItems(${o.id})">▶</button></td>
      <td style="font-weight:700;color:#fff">${o.order_no}</td>
      <td>${o.username || '—'}</td>
      <td style="color:var(--gold);font-weight:700">${fmt(o.total_price)} pts</td>
      <td>${statusBadge(o.status)}</td>
      <td style="color:var(--muted);font-size:.78rem">${o.created_at.substring(0, 10)}</td>
      <td>
        <div style="display:flex;gap:.4rem;flex-wrap:wrap">
          <button class="btn btn-edit btn-sm" onclick="openStatusModal(${o.id},'${o.order_no}','${o.status}')">
            <img src="/assets/img/edit.png" class="w-4"> Status
          </button>
          <button class="btn btn-delete btn-sm" id="del-order-${o.id}"
                  onclick="confirmDeleteOrder(${o.id},'${o.order_no}', this)">
            <img src="/assets/img/trash-can.png" class="w-4">
          </button>
        </div>
      </td>
    </tr>
    <tr class="order-items-row" id="items-row-${o.id}">
      <td colspan="7">
        <div class="order-items-inner">
          <div style="font-size:.78rem;color:var(--muted);font-weight:700;margin-bottom:.4rem">ORDER ITEMS</div>
          <div class="items-list" id="items-list-${o.id}">
            <span style="color:var(--muted);font-size:.8rem">Loading…</span>
          </div>
        </div>
      </td>
    </tr>
  `).join('');
}

const loadedItems = {};
function toggleItems(orderId) {
  const row = document.getElementById(`items-row-${orderId}`);
  const isOpen = row.classList.contains('open');
  document.querySelectorAll('.order-items-row.open').forEach(r => r.classList.remove('open'));
  if (isOpen) return;
  row.classList.add('open');
  if (loadedItems[orderId]) return;
  fetch(`/admin/order-items/${orderId}`)
    .then(r => r.json())
    .then(items => {
      loadedItems[orderId] = true;
      const list = document.getElementById(`items-list-${orderId}`);
      if (!items.length) { 
        list.innerHTML = '<span style="color:var(--muted)">No items</span>'; 
        return; 
      }
      list.innerHTML = items.map(i => `
        <div class="item-line">
          <img src="/assets/img/${i.image}" style="width:32px;height:32px;border-radius:6px;background:#fff;object-fit:contain;padding:2px"/>
          <span style="flex:1">${i.name}</span>
          <span style="color:var(--muted)">× ${i.qty}</span>
          <span style="color:var(--gold);font-weight:700;min-width:70px;text-align:right">${fmt(i.unit_price)} pts</span>
        </div>
      `).join('');
    })
    .catch(() => {
      document.getElementById(`items-list-${orderId}`).innerHTML =
        '<span style="color:var(--muted)">Could not load items</span>';
    });
}

function openStatusModal(id, orderNo, currentStatus) {
  document.getElementById('s-orderno').value = orderNo;
  document.getElementById('s-status').value = currentStatus;
  document.getElementById('status-form').action = `/admin/orders/${id}/status`;
  document.getElementById('status-modal').classList.add('open');
}

function closeStatusModal() {
  document.getElementById('status-modal').classList.remove('open');
}

/* DELETE ORDER – fetch, hapus baris langsung */
function confirmDeleteOrder(id, orderNo, btn) {
  if (!confirm(`Hapus order ${orderNo}? Tindakan ini tidak bisa dibatalkan.`)) return;

  btn.classList.add('loading');

  fetch(`/admin/orders/${id}/delete`, { method: 'POST' })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        // Hapus dari array JS
        const idx = ORDERS.findIndex(o => o.id == id);
        if (idx !== -1) ORDERS.splice(idx, 1);

        // Animasi hilang lalu hapus baris dari DOM
        const row = document.getElementById(`order-row-${id}`);
        const itemsRow = document.getElementById(`items-row-${id}`);
        [row, itemsRow].forEach(r => {
          if (r) { 
            r.style.transition = 'opacity .3s'; 
            r.style.opacity = '0'; 
          }
        });
        setTimeout(() => {
          row?.remove();
          itemsRow?.remove();
        }, 300);

        // Update stat counters
        updateOrderStats();

        showToast(`Order ${orderNo} berhasil dihapus.`, 'success');
      } else {
        btn.classList.remove('loading');
        showToast('Gagal menghapus order.', 'error');
      }
    })
    .catch(() => {
      btn.classList.remove('loading');
      showToast('Gagal menghapus order.', 'error');
    });
}

/* Update order statistics */
function updateOrderStats() {
  const totalEl = document.getElementById('stat-total');
  const pendingEl = document.getElementById('stat-pending');
  
  if (totalEl) totalEl.textContent = ORDERS.length;
  if (pendingEl) {
    const pendingCount = ORDERS.filter(o => o.status === 'pending').length;
    pendingEl.textContent = pendingCount;
  }
}

/* PRODUCTS */
function renderProducts() {
  const q = document.getElementById('product-search').value.toLowerCase();
  const rows = PRODUCTS.filter(p =>
    !q || p.name.toLowerCase().includes(q) || (p.categories || '').toLowerCase().includes(q)
  );
  const tbody = document.getElementById('products-tbody');
  if (!rows.length) {
    tbody.innerHTML = `<tr><td colspan="6" style="text-align:center;color:var(--muted);padding:2rem">No products found</td></tr>`;
    return;
  }
  tbody.innerHTML = rows.map(p => {
    const productJson = JSON.stringify(p).replace(/"/g, '&quot;');
    const escapedName = p.name.replace(/'/g, "\\'");
    return `
    <tr id="product-row-${p.id}">
      <td>
        ${p.image
          ? `<img src="/assets/img/${p.image}" class="prod-thumb" alt="${p.name}"/>`
          : `<div style="width:40px;height:40px;border-radius:8px;background:var(--border);display:flex;align-items:center;justify-content:center;font-size:.7rem;color:var(--muted)">N/A</div>`
        }
      </td>
      <td style="font-weight:700;color:#fff;max-width:200px">${p.name}</td>
      <td>
        <span style="background:var(--card);border:1px solid var(--border);padding:.2rem .6rem;border-radius:20px;font-size:.72rem;color:var(--muted)">
          ${p.categories || '—'}
        </span>
      </td>
      <td style="color:var(--gold);font-weight:700">${fmt(p.price)}</td>
      <td style="color:var(--muted)">${p.seller || '—'}</td>
      <td>
        <div style="display:flex;gap:.4rem">
          <button class="btn btn-edit btn-sm" onclick='openProductModal(${productJson})'>
            <img src="/assets/img/edit.png" class="w-4"> Edit
          </button>
          <button class="btn btn-delete btn-sm" id="del-prod-${p.id}"
                  onclick="confirmDeleteProduct(${p.id}, '${escapedName}', this)">
            <img src="/assets/img/trash-can.png" class="w-4">
          </button>
        </div>
      </td>
    </tr>
  `;
  }).join('');
}

/* DELETE PRODUCT – fetch, hapus baris langsung */
function confirmDeleteProduct(id, name, btn) {
  if (!confirm(`Hapus "${name}"? Tindakan ini tidak bisa dibatalkan.`)) return;

  btn.classList.add('loading');

  fetch(`/admin/products/${id}/delete`, { method: 'POST' })
    .then(r => r.json())
    .then(data => {
      if (data.success) {
        // Hapus dari array JS
        const idx = PRODUCTS.findIndex(p => p.id == id);
        if (idx !== -1) PRODUCTS.splice(idx, 1);

        // Animasi fade out lalu hapus baris dari DOM
        const row = document.getElementById(`product-row-${id}`);
        if (row) {
          row.style.transition = 'opacity .3s, transform .3s';
          row.style.opacity = '0';
          row.style.transform = 'translateX(20px)';
          setTimeout(() => row.remove(), 300);
        }

        // Update stat card
        const statEl = document.getElementById('stat-products');
        if (statEl) statEl.textContent = PRODUCTS.length;

        showToast(`"${name}" berhasil dihapus.`, 'success');
      } else {
        btn.classList.remove('loading');
        showToast('Gagal menghapus produk.', 'error');
      }
    })
    .catch(() => {
      btn.classList.remove('loading');
      showToast('Gagal menghapus produk.', 'error');
    });
}

/* Product modal */
function openProductModal(product) {
  const isEdit = !!product;
  document.getElementById('modal-title').textContent = isEdit ? 'Edit Product' : 'Add Product';
  document.getElementById('modal-submit-btn').textContent = isEdit ? 'Save Changes' : 'Save Product';

  if (isEdit) {
    document.getElementById('product-form').action = `/admin/products/${product.id}/update`;
    document.getElementById('form-pid').value = product.id;
    document.getElementById('f-name').value = product.name;
    document.getElementById('f-cat').value = product.categories || '';
    document.getElementById('f-price').value = product.price;
    document.getElementById('f-seller').value = product.seller || '';
    document.getElementById('f-short').value = product.short_description || '';
    document.getElementById('f-desc').value = product.description || '';
    document.getElementById('f-img').value = product.image || '';
    document.getElementById('f-img1').value = product.smallimg1 || '';
    document.getElementById('f-img2').value = product.smallimg2 || '';
  } else {
    document.getElementById('product-form').action = '/admin/products/store';
    document.getElementById('product-form').reset();
  }
  document.getElementById('product-modal').classList.add('open');
}

function closeProductModal() {
  document.getElementById('product-modal').classList.remove('open');
}

document.querySelectorAll('.modal-overlay').forEach(el => {
  el.addEventListener('click', e => { 
    if (e.target === el) el.classList.remove('open'); 
  });
});

document.addEventListener('DOMContentLoaded', function() {

});