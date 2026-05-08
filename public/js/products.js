function toggleHeart(btn) {
    const img = btn.querySelector('img');
    if (img.dataset.state === 'filled') {
      img.src = '/assets/img/unfilled-heart.png';
      img.dataset.state = 'empty';
    } else {
      img.src = '/assets/img/filled-heart.png';
      img.dataset.state = 'filled';
    }
  }

  function toggleAdded(btn) {
    const added = btn.dataset.added === '1';
    btn.dataset.added = added ? '' : '1';
    btn.textContent = added ? 'Add to Cart' : '+ Added';
    btn.style.background = added ? '' : '#5a5890';
  }

  function filterProducts() {
    const query = document.getElementById('search-input').value.toLowerCase().trim();
    const activeCats = [];
    document.querySelectorAll('.cat-btn').forEach(b => {
      if (b.dataset.active === '1') activeCats.push(b.dataset.cat);
    });

    let visible = 0;
    document.querySelectorAll('.product-card').forEach(card => {
      const name = card.dataset.name || '';
      const tags = (card.dataset.tags || '').split(',').map(t => t.trim().toLowerCase());
      const matchSearch = !query || name.includes(query);
      const matchCat = activeCats.length === 0 || activeCats.some(cat => tags.some(tag => tag.includes(cat) || cat.includes(tag)));
      card.style.display = (matchSearch && matchCat) ? '' : 'none';
      if (matchSearch && matchCat) visible++;
    });

    document.getElementById('empty-state').classList.toggle('hidden', visible > 0);
  }

  function toggleCategory(btn) {
    const isActive = btn.dataset.active === '1';
    const circle = btn.querySelector('.cat-circle');
    const label  = btn.querySelector('.cat-label');
    const badge  = btn.querySelector('.cat-badge');
    btn.dataset.active = isActive ? '0' : '1';
    circle.style.background = isActive ? '#4a4870' : '#6b5fff';
    circle.style.boxShadow  = isActive ? 'none' : '0 8px 20px rgba(107,95,255,.35)';
    label.style.color       = isActive ? '#7a78a0' : '#fff';
    label.style.fontWeight  = isActive ? '600' : '700';
    badge.style.display     = isActive ? 'none' : 'flex';
    filterProducts();
  }

  filterProducts();

  /* ============================================================
   products.js  —  Halaman Products
   - Filter kategori (toggle aktif/nonaktif)
   - Search real-time
   - Add to Cart → localStorage (key: saquwile_cart)
   - Heart / Wishlist toggle
   ============================================================ */

const CART_KEY = 'saquwile_cart';

/* ---------- Helpers ---------- */
function getCart() {
  try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
  catch { return []; }
}

function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
}

/* ---------- Cart Badge ---------- */
function updateCartBadge() {
  const cart  = getCart();
  const total = cart.reduce((sum, i) => sum + i.qty, 0);
  const badge = document.getElementById('cart-badge');
  if (!badge) return;
  badge.textContent    = total;
  badge.style.display  = total > 0 ? 'inline-flex' : 'none';
}

/* ---------- Category Filter ---------- */
function toggleCategory(btn) {
  const isActive = btn.dataset.active === '1';
  const circle   = btn.querySelector('.cat-circle');
  const label    = btn.querySelector('.cat-label');
  const badge    = btn.querySelector('.cat-badge');

  if (isActive) {
    /* Nonaktifkan */
    btn.dataset.active       = '0';
    circle.style.background  = '#4a4870';
    circle.style.boxShadow   = 'none';
    label.style.color        = '#7a78a0';
    label.style.fontWeight   = '600';
    badge.style.display      = 'none';
  } else {
    /* Aktifkan */
    btn.dataset.active       = '1';
    circle.style.background  = '#6b5fff';
    circle.style.boxShadow   = '0 8px 20px rgba(107,95,255,.35)';
    label.style.color        = '#fff';
    label.style.fontWeight   = '700';
    badge.style.display      = 'flex';
  }

  filterProducts();
}

/* ---------- Core Filter (kategori + search) ---------- */
function filterProducts() {
  const query = (document.getElementById('search-input')?.value || '').toLowerCase().trim();

  /* Kumpulkan kategori yang aktif */
  const activeCats = [];
  document.querySelectorAll('.cat-btn[data-active="1"]').forEach(btn => {
    activeCats.push(btn.dataset.cat.toLowerCase());
  });

  const cards    = document.querySelectorAll('.product-card');
  let   visible  = 0;

  cards.forEach(card => {
    const name = (card.dataset.name || '').toLowerCase();
    const tags = (card.dataset.tags || '').toLowerCase().split(',').map(t => t.trim());

    /* Cocokkan kategori: tampilkan jika tidak ada filter aktif, atau tags-nya match */
    const catMatch = activeCats.length === 0
      || activeCats.some(cat => tags.includes(cat) || tags.some(t => t.includes(cat)));

    /* Cocokkan search */
    const searchMatch = !query || name.includes(query) || tags.some(t => t.includes(query));

    if (catMatch && searchMatch) {
      card.style.display = '';
      visible++;
    } else {
      card.style.display = 'none';
    }
  });

  /* Empty state */
  const emptyEl = document.getElementById('empty-state');
  if (emptyEl) emptyEl.classList.toggle('hidden', visible > 0);
}

/* ---------- Heart / Wishlist ---------- */
function toggleHeart(btn) {
  const img   = btn.querySelector('img');
  const empty = img.dataset.state === 'empty';

  img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
  img.dataset.state = empty ? 'filled' : 'empty';
}

/* ---------- Add to Cart ---------- */
function toggleAdded(btn) {
  const card  = btn.closest('.product-card');
  const name  = card?.querySelector('p.text-white')?.textContent?.trim() || 'Produk';
  const price = parseInt(card?.querySelector('span.text-\\[\\#f5a800\\]')?.textContent || '0', 10);
  const img   = card?.querySelector('img.anim-float')?.src || '';

  const added = btn.dataset.added === '1';

  if (!added) {
    const cart     = getCart();
    const existing = cart.find(i => i.name === name);

    if (existing) {
      existing.qty += 1;
    } else {
      cart.push({
        name,
        price,
        img,
        qty: 1,
        orderId: Math.floor(100000 + Math.random() * 900000).toString()
      });
    }

    saveCart(cart);

    btn.textContent   = 'Added ✓';
    btn.dataset.added = '1';
    btn.style.color   = '#a78bfa';
  } else {
    let cart = getCart();
    cart     = cart.filter(i => i.name !== name);
    saveCart(cart);

    btn.textContent   = 'Add to Cart';
    btn.dataset.added = '0';
    btn.style.color   = '';
  }

  updateCartBadge();
}

/* ---------- Sinkronisasi status tombol saat halaman dimuat ---------- */
function syncButtonStates() {
  const cart = getCart();
  document.querySelectorAll('.product-card').forEach(card => {
    const name = card.querySelector('p.text-white')?.textContent?.trim();
    const btn  = card.querySelector('[onclick="toggleAdded(this)"]');
    if (!btn || !name) return;

    if (cart.find(i => i.name === name)) {
      btn.textContent   = 'Added ✓';
      btn.dataset.added = '1';
      btn.style.color   = '#a78bfa';
    }
  });
}

/* ---------- Init ---------- */
document.addEventListener('DOMContentLoaded', () => {
  syncButtonStates();
  updateCartBadge();
  filterProducts();   /* terapkan filter default (stationary + book aktif) */
});