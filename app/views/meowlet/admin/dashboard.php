<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet - Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --bg:      #2d2b3d;
      --surface: #3a3852;
      --card:    #1e1c2e;
      --border:  #4a4870;
      --purple:  #6b5fff;
      --purple2: #a78bfa;
      --text:    #b0aec8;
      --muted:   #7a78a0;
      --gold:    #f5a800;
      --danger:  #ef4444;
    }
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
      font-family: 'Koh Santepheap', sans-serif;
      background: var(--bg);
      color: var(--text);
      min-height: 100vh;
    }

    /* ── Sidebar ── */
    .sidebar {
      position: fixed; top: 0; left: 0;
      width: 220px; height: 100vh;
      background: var(--card);
      border-right: 1px solid var(--border);
      display: flex; flex-direction: column;
      padding: 1.5rem 1rem;
      z-index: 100;
    }
    .sidebar .logo {
      font-family: 'Fredoka One', cursive;
      font-size: 1.4rem; color: #fff;
      display: flex; align-items: center; gap: .5rem;
      margin-bottom: 2rem;
    }
    .sidebar .logo span { color: var(--purple2); }
    .nav-item {
      display: flex; align-items: center; gap: .75rem;
      padding: .6rem .9rem; border-radius: 10px;
      font-size: .88rem; font-weight: 700; color: var(--muted);
      cursor: pointer; transition: all .2s;
      border: none; background: transparent; width: 100%; text-align: left;
    }
    .nav-item:hover, .nav-item.active {
      background: var(--surface); color: #fff;
    }
    .nav-item.active { color: var(--purple2); }
    .nav-icon { font-size: 1.1rem; }

    /* ── Main ── */
    .main { margin-left: 220px; padding: 2rem; min-height: 100vh; }

    /* ── Topbar ── */
    .topbar {
      display: flex; align-items: center; justify-content: space-between;
      margin-bottom: 1.75rem;
    }
    .topbar h1 {
      font-size: 1.6rem; font-weight: 900; color: #fff;
    }
    .topbar .badge-admin {
      background: var(--purple); color: #fff;
      font-size: .72rem; font-weight: 700;
      padding: .3rem .8rem; border-radius: 20px; letter-spacing: .04em;
    }

    /* ── Stat cards ── */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 1rem; margin-bottom: 2rem;
    }
    .stat-card {
      background: var(--card); border-radius: 14px;
      padding: 1.1rem 1.2rem;
      border: 1px solid var(--border);
    }
    .stat-card .label { font-size: .74rem; color: var(--muted); margin-bottom: .4rem; }
    .stat-card .value { font-size: 1.7rem; font-weight: 900; color: #fff; }
    .stat-card .value.gold  { color: var(--gold); }
    .stat-card .value.green { color: #4ade80; }
    .stat-card .value.red   { color: var(--danger); }

    /* ── Tabs ── */
    .tabs { display: flex; gap: .5rem; margin-bottom: 1.5rem; }
    .tab-btn {
      padding: .55rem 1.3rem; border-radius: 10px;
      font-size: .85rem; font-weight: 700;
      border: 1px solid var(--border);
      background: transparent; color: var(--muted);
      cursor: pointer; transition: all .2s;
    }
    .tab-btn.active, .tab-btn:hover {
      background: var(--purple); color: #fff; border-color: var(--purple);
    }

    /* ── Panel ── */
    .panel { display: none; }
    .panel.active { display: block; }

    /* ── Table ── */
    .tbl-wrap { overflow-x: auto; border-radius: 14px; border: 1px solid var(--border); }
    table {
      width: 100%; border-collapse: collapse;
      font-size: .83rem;
    }
    thead th {
      background: var(--card); color: var(--muted);
      padding: .8rem 1rem; font-weight: 700;
      text-align: left; white-space: nowrap;
      border-bottom: 1px solid var(--border);
    }
    tbody tr { border-bottom: 1px solid var(--border); transition: background .15s; }
    tbody tr:last-child { border-bottom: none; }
    tbody tr:hover { background: rgba(107,95,255,.06); }
    tbody td { padding: .75rem 1rem; color: var(--text); vertical-align: middle; }

    /* ── Badges (status) ── */
    .badge {
      display: inline-flex; align-items: center;
      padding: .25rem .65rem; border-radius: 20px;
      font-size: .72rem; font-weight: 700; white-space: nowrap;
    }
    .badge.pending    { background:#3b2a00; color:var(--gold); }
    .badge.processing { background:#1e2e50; color:#60a5fa; }
    .badge.shipped    { background:#1a3040; color:#22d3ee; }
    .badge.completed  { background:#0f2e1a; color:#4ade80; }
    .badge.cancelled  { background:#2e1010; color:var(--danger); }

    /* ── Buttons ── */
    .btn {
      display: inline-flex; align-items: center; gap: .4rem;
      padding: .45rem .9rem; border-radius: 9px;
      font-size: .8rem; font-weight: 700; cursor: pointer;
      border: none; transition: all .15s;
    }
    .btn-primary  { background: var(--purple); color: #fff; }
    .btn-primary:hover { opacity: .85; }
    .btn-edit     { background: #1e2e50; color: #60a5fa; }
    .btn-edit:hover { background: #2a3f70; }
    .btn-delete   { background: #2e1010; color: var(--danger); }
    .btn-delete:hover { background: #3f1515; }
    .btn-sm { padding: .3rem .65rem; font-size: .74rem; border-radius: 7px; }

    /* ── Search / filter bar ── */
    .toolbar {
      display: flex; align-items: center; gap: .75rem;
      margin-bottom: 1rem; flex-wrap: wrap;
    }
    .toolbar input, .toolbar select {
      background: var(--card); border: 1px solid var(--border);
      color: #fff; border-radius: 10px; padding: .5rem .85rem;
      font-size: .83rem; outline: none;
      font-family: inherit;
    }
    .toolbar input::placeholder { color: var(--muted); }
    .toolbar input:focus, .toolbar select:focus { border-color: var(--purple); }
    .toolbar select option { background: var(--card); }

    /* ── Modal overlay ── */
    .modal-overlay {
      display: none; position: fixed; inset: 0; z-index: 999;
      background: rgba(0,0,0,.65);
      align-items: center; justify-content: center;
    }
    .modal-overlay.open { display: flex; }
    .modal {
      background: var(--surface); border-radius: 18px;
      border: 1px solid var(--border);
      width: 100%; max-width: 560px; max-height: 90vh;
      overflow-y: auto; padding: 1.75rem;
    }
    .modal h2 { font-size: 1.1rem; font-weight: 900; color: #fff; margin-bottom: 1.2rem; }
    .form-group { margin-bottom: 1rem; }
    .form-group label { display: block; font-size: .78rem; font-weight: 700; color: var(--muted); margin-bottom: .35rem; }
    .form-group input, .form-group textarea, .form-group select {
      width: 100%; background: var(--card);
      border: 1px solid var(--border); border-radius: 10px;
      padding: .6rem .85rem; color: #fff; font-size: .85rem;
      outline: none; font-family: inherit;
      transition: border-color .2s;
    }
    .form-group textarea { resize: vertical; min-height: 80px; }
    .form-group input:focus, .form-group textarea:focus, .form-group select:focus {
      border-color: var(--purple);
    }
    .form-group input::placeholder, .form-group textarea::placeholder { color: var(--muted); }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
    .modal-footer { display: flex; justify-content: flex-end; gap: .6rem; margin-top: 1.4rem; }
    .btn-cancel { background: var(--card); color: var(--text); border: 1px solid var(--border); }
    .btn-cancel:hover { border-color: var(--purple2); color: #fff; }

    /* ── Product image thumb ── */
    .prod-thumb {
      width: 40px; height: 40px; border-radius: 8px;
      background: #fff; object-fit: contain; padding: 3px;
    }

    /* ── Order detail accordion ── */
    .order-items-row { display: none; background: rgba(30,28,46,.6); }
    .order-items-row.open { display: table-row; }
    .order-items-inner { padding: .75rem 1rem 1rem 3rem; }
    .items-list { display: flex; flex-direction: column; gap: .5rem; margin-top: .5rem; }
    .item-line {
      display: flex; align-items: center; gap: .75rem;
      font-size: .8rem; color: var(--text);
    }
    .toggle-btn { background: transparent; border: none; cursor: pointer; color: var(--purple2); font-size: 1rem; }

    @keyframes fadeIn { from{opacity:0;transform:translateY(6px)} to{opacity:1;transform:none} }
    .panel.active { animation: fadeIn .2s ease; }
  </style>
</head>
<body>

<?php
// ─────────────────────────────────────────────
//  Make PHP data available to inline JS
// ─────────────────────────────────────────────
$productsJson = json_encode($products, JSON_HEX_TAG | JSON_HEX_APOS);
$ordersJson   = json_encode($orders,   JSON_HEX_TAG | JSON_HEX_APOS);
?>

<!-- ══════════════ SIDEBAR ══════════════ -->
<aside class="sidebar">
  <div class="logo"><img src="/assets/img/logo.png" class="w-48"></div>
  <nav style="display:flex;flex-direction:column;gap:.3rem">
    <button class="nav-item active" onclick="switchTab('orders')">
      <img src="/assets/img/box.png">Orders
    </button>
    <button class="nav-item" onclick="switchTab('products')">
      <img src="/assets/img/list.png"> Products
    </button>
  </nav>
  <div style="margin-top:auto">
    <a href="/main" style="display:flex;align-items:center;gap:.6rem;color:var(--muted);font-size:.8rem;font-weight:700;text-decoration:none;padding:.5rem .9rem;border-radius:10px;transition:color .2s" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'">
      ← Back to Site
    </a>
  </div>
</aside>

<!-- ══════════════ MAIN ══════════════ -->
<main class="main">

  <!-- Topbar -->
  <div class="topbar">
    <h1 id="page-title">Orders</h1>
    <div style="display:flex;align-items:center;gap:.75rem">
      <span class="badge-admin">ADMIN</span>
      <span style="font-size:.82rem;color:var(--muted)"><?= htmlspecialchars($_SESSION['user']['username'] ?? 'Admin') ?></span>
    </div>
  </div>

  <!-- ── STAT CARDS ── -->
  <div class="stats-grid">
    <div class="stat-card">
      <div class="label">Total Orders</div>
      <div class="value"><?= (int)($stats['total'] ?? 0) ?></div>
    </div>
    <div class="stat-card">
      <div class="label">Total Revenue</div>
      <div class="value gold"><?= number_format($stats['revenue'] ?? 0, 0, ',', '.') ?></div>
    </div>
    <div class="stat-card">
      <div class="label">Pending</div>
      <div class="value gold"><?= (int)($stats['pending'] ?? 0) ?></div>
    </div>
    <div class="stat-card">
      <div class="label">Completed</div>
      <div class="value green"><?= (int)($stats['completed'] ?? 0) ?></div>
    </div>
    <div class="stat-card">
      <div class="label">Cancelled</div>
      <div class="value red"><?= (int)($stats['cancelled'] ?? 0) ?></div>
    </div>
    <div class="stat-card">
      <div class="label">Products</div>
      <div class="value"><?= count($products) ?></div>
    </div>
  </div>

  <!-- ══════════ ORDERS PANEL ══════════ -->
  <div id="panel-orders" class="panel active">

    <div class="toolbar">
      <input type="text" id="order-search" placeholder="Search order / user…" oninput="renderOrders()" style="width:220px"/>
      <select id="order-filter" onchange="renderOrders()">
        <option value="">All Status</option>
        <option value="pending">Pending</option>
        <option value="processing">Processing</option>
        <option value="shipped">Shipped</option>
        <option value="completed">Completed</option>
        <option value="cancelled">Cancelled</option>
      </select>
    </div>

    <div class="tbl-wrap">
      <table>
        <thead>
          <tr>
            <th></th>
            <th>Order No</th>
            <th>User</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="orders-tbody"></tbody>
      </table>
    </div>
  </div>

  <!-- ══════════ PRODUCTS PANEL ══════════ -->
  <div id="panel-products" class="panel">

    <div class="toolbar">
      <input type="text" id="product-search" placeholder="Search product…" oninput="renderProducts()" style="width:220px"/>
      <button class="btn btn-primary" onclick="openProductModal()">+ Add Product</button>
    </div>

    <div class="tbl-wrap">
      <table>
        <thead>
          <tr>
            <th>Img</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Seller</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="products-tbody"></tbody>
      </table>
    </div>
  </div>

</main><!-- /main -->

<!-- ══════════════ MODAL – PRODUCT FORM ══════════════ -->
<div class="modal-overlay" id="product-modal">
  <div class="modal">
    <h2 id="modal-title">Add Product</h2>
    <form id="product-form" method="POST">
      <input type="hidden" name="_method" id="form-method" value="POST"/>
      <input type="hidden" name="product_id" id="form-pid"/>

      <div class="form-row">
        <div class="form-group">
          <label>Product Name *</label>
          <input type="text" name="name" id="f-name" placeholder="e.g. Cat Paw Eraser" required/>
        </div>
        <div class="form-group">
          <label>Category *</label>
          <input type="text" name="categories" id="f-cat" placeholder="Stationary" required/>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Price (points) *</label>
          <input type="number" name="price" id="f-price" placeholder="0" min="0" required/>
        </div>
        <div class="form-group">
          <label>Seller</label>
          <input type="text" name="seller" id="f-seller" placeholder="Seller name"/>
        </div>
      </div>

      <div class="form-group">
        <label>Short Description</label>
        <textarea name="short_description" id="f-short" placeholder="Brief product description…" rows="2"></textarea>
      </div>

      <div class="form-group">
        <label>Full Description</label>
        <textarea name="description" id="f-desc" placeholder="Detailed product description…" rows="4"></textarea>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label>Main Image filename</label>
          <input type="text" name="image" id="f-img" placeholder="product.png"/>
        </div>
        <div class="form-group">
          <label>Thumbnail 1</label>
          <input type="text" name="smallimg1" id="f-img1" placeholder="product2.jpg"/>
        </div>
      </div>

      <div class="form-group" style="max-width:50%">
        <label>Thumbnail 2</label>
        <input type="text" name="smallimg2" id="f-img2" placeholder="product3.jpg"/>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-cancel" onclick="closeProductModal()">Cancel</button>
        <button type="submit" class="btn btn-primary" id="modal-submit-btn">Save Product</button>
      </div>
    </form>
  </div>
</div>

<!-- ══════════════ MODAL – UPDATE ORDER STATUS ══════════════ -->
<div class="modal-overlay" id="status-modal">
  <div class="modal" style="max-width:360px">
    <h2>Update Order Status</h2>
    <form method="POST" id="status-form">
      <input type="hidden" name="_method" value="PATCH"/>
      <div class="form-group">
        <label>Order No</label>
        <input type="text" id="s-orderno" readonly style="opacity:.6"/>
      </div>
      <div class="form-group">
        <label>New Status *</label>
        <select name="status" id="s-status">
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="shipped">Shipped</option>
          <option value="completed">Completed</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-cancel" onclick="closeStatusModal()">Cancel</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
</div>

<!-- ══════════════ SCRIPT ══════════════ -->
<script>
  /* ── raw PHP data ── */
  const PRODUCTS = <?= $productsJson ?>;
  const ORDERS   = <?= $ordersJson ?>;

  /* ── helpers ── */
  const statusBadge = s =>
    `<span class="badge ${s}">${s.charAt(0).toUpperCase()+s.slice(1)}</span>`;

  const fmt = n => Number(n).toLocaleString('id-ID');

  /* ────────────────────────────────────
     TAB SWITCHING
  ──────────────────────────────────── */
  function switchTab(tab) {
    document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.nav-item').forEach(b => b.classList.remove('active'));
    document.getElementById('panel-' + tab).classList.add('active');
    const btns = document.querySelectorAll('.nav-item');
    if (tab === 'orders')   { btns[0].classList.add('active'); document.getElementById('page-title').textContent='Orders'; }
    if (tab === 'products') { btns[1].classList.add('active'); document.getElementById('page-title').textContent='Products'; }
  }

  /* ────────────────────────────────────
     ORDERS TABLE
  ──────────────────────────────────── */
  function renderOrders() {
    const q   = document.getElementById('order-search').value.toLowerCase();
    const fil = document.getElementById('order-filter').value;
    const rows = ORDERS.filter(o =>
      (!fil || o.status === fil) &&
      (!q   || o.order_no.toLowerCase().includes(q) || (o.username||'').toLowerCase().includes(q))
    );
    const tbody = document.getElementById('orders-tbody');
    if (!rows.length) {
      tbody.innerHTML = `<tr><td colspan="7" style="text-align:center;color:var(--muted);padding:2rem">No orders found</td></tr>`;
      return;
    }
    tbody.innerHTML = rows.map(o => `
      <tr>
        <td>
          <button class="toggle-btn" onclick="toggleItems(${o.id})" title="View items">▶</button>
        </td>
        <td style="font-weight:700;color:#fff">${o.order_no}</td>
        <td>${o.username || '—'}</td>
        <td style="color:var(--gold);font-weight:700">${fmt(o.total_price)} pts</td>
        <td>${statusBadge(o.status)}</td>
        <td style="color:var(--muted);font-size:.78rem">${o.created_at.substring(0,10)}</td>
        <td>
          <div style="display:flex;gap:.4rem;flex-wrap:wrap">
            <button class="btn btn-edit btn-sm" onclick="openStatusModal(${o.id},'${o.order_no}','${o.status}')"><img src="/assets/img/edit.png" class="w-4">Status</button>
            <button class="btn btn-delete btn-sm" onclick="confirmDeleteOrder(${o.id},'${o.order_no}')"><img src="/assets/img/trash-can.png" class="w-4"></button>
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

  /* Expand / collapse order items (fetched via AJAX) */
  const loadedItems = {};
  function toggleItems(orderId) {
    const row = document.getElementById(`items-row-${orderId}`);
    const isOpen = row.classList.contains('open');
    // close all
    document.querySelectorAll('.order-items-row.open').forEach(r => r.classList.remove('open'));
    if (isOpen) return;

    row.classList.add('open');
    if (loadedItems[orderId]) return; // already fetched

    fetch(`/admin/order-items/${orderId}`)
      .then(r => r.json())
      .then(items => {
        loadedItems[orderId] = true;
        const list = document.getElementById(`items-list-${orderId}`);
        if (!items.length) { list.innerHTML = '<span style="color:var(--muted)">No items</span>'; return; }
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

  /* ── Status modal ── */
  function openStatusModal(id, orderNo, currentStatus) {
    document.getElementById('s-orderno').value = orderNo;
    document.getElementById('s-status').value  = currentStatus;
    document.getElementById('status-form').action = `/admin/orders/${id}/status`;
    document.getElementById('status-modal').classList.add('open');
  }
  function closeStatusModal() {
    document.getElementById('status-modal').classList.remove('open');
  }

  function confirmDeleteOrder(id, orderNo) {
    if (!confirm(`Delete order ${orderNo}? This cannot be undone.`)) return;
    const f = document.createElement('form');
    f.method = 'POST'; f.action = `/admin/orders/${id}/delete`;
    f.innerHTML = '<input name="_method" value="DELETE"/>';
    document.body.appendChild(f); f.submit();
  }

  /* ────────────────────────────────────
     PRODUCTS TABLE
  ──────────────────────────────────── */
  function renderProducts() {
    const q = document.getElementById('product-search').value.toLowerCase();
    const rows = PRODUCTS.filter(p =>
      !q || p.name.toLowerCase().includes(q) || (p.categories||'').toLowerCase().includes(q)
    );
    const tbody = document.getElementById('products-tbody');
    if (!rows.length) {
      tbody.innerHTML = `<tr><td colspan="6" style="text-align:center;color:var(--muted);padding:2rem">No products found</td></tr>`;
      return;
    }
    tbody.innerHTML = rows.map(p => `
      <tr>
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
            <button class="btn btn-edit btn-sm" onclick='openProductModal(${JSON.stringify(p)})'><img src="/assets/img/edit.png" class="w-4">Edit</button>
            <button class="btn btn-delete btn-sm" onclick="confirmDeleteProduct(${p.id},'${p.name.replace(/'/g,"\\'")}')"><img src="/assets/img/trash-can.png" class="w-4"></button>
          </div>
        </td>
      </tr>
    `).join('');
  }

  /* ── Product modal ── */
  function openProductModal(product) {
    const modal = document.getElementById('product-modal');
    const isEdit = !!product;
    document.getElementById('modal-title').textContent = isEdit ? 'Edit Product' : 'Add Product';
    document.getElementById('modal-submit-btn').textContent = isEdit ? 'Save Changes' : 'Save Product';

    if (isEdit) {
      document.getElementById('product-form').action = `/admin/products/${product.id}/update`;
      document.getElementById('form-method').value   = 'PUT';
      document.getElementById('form-pid').value      = product.id;
      document.getElementById('f-name').value        = product.name;
      document.getElementById('f-cat').value         = product.categories || '';
      document.getElementById('f-price').value       = product.price;
      document.getElementById('f-seller').value      = product.seller || '';
      document.getElementById('f-short').value       = product.short_description || '';
      document.getElementById('f-desc').value        = product.description || '';
      document.getElementById('f-img').value         = product.image || '';
      document.getElementById('f-img1').value        = product.smallimg1 || '';
      document.getElementById('f-img2').value        = product.smallimg2 || '';
    } else {
      document.getElementById('product-form').action = '/admin/products/store';
      document.getElementById('form-method').value   = 'POST';
      document.getElementById('product-form').reset();
    }
    modal.classList.add('open');
  }
  function closeProductModal() {
    document.getElementById('product-modal').classList.remove('open');
  }

  function confirmDeleteProduct(id, name) {
    if (!confirm(`Delete "${name}"? This cannot be undone.`)) return;
    const f = document.createElement('form');
    f.method = 'POST'; f.action = `/admin/products/${id}/delete`;
    f.innerHTML = '<input name="_method" value="DELETE"/>';
    document.body.appendChild(f); f.submit();
  }

  /* ── Close modal on backdrop click ── */
  document.querySelectorAll('.modal-overlay').forEach(el => {
    el.addEventListener('click', e => { if (e.target === el) el.classList.remove('open'); });
  });

  /* ── Initial render ── */
  renderOrders();
  renderProducts();
</script>
</body>
</html>