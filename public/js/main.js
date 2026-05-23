const CART_KEY = 'meowlet_cart';
const FAV_KEY  = 'meowlet_favourites';

const PRODUCT_MAP = {
  'Cat Paw Sharpener':        { id: 1 },
  'Pen SmoothWrite 0.5 mm':   { id: 2 },
  'Cat Paw Stapler':          { id: 3 },
  'Immanuel Big Blue Book':   { id: 4 },
  'Immanuel Math Book':       { id: 5 },
  'Premium Crochet Red Yarn': { id: 6 },
};

function toggleAcc(id) {
  const body  = document.getElementById('body-' + id);
  const arrow = document.getElementById('arrow-' + id);
  const isOpen = body.style.maxHeight && body.style.maxHeight !== '0px';
  if (isOpen) {
    body.style.maxHeight  = '0';
    arrow.style.transform = 'rotate(0deg)';
  } else {
    body.style.maxHeight  = body.scrollHeight + 'px';
    arrow.style.transform = 'rotate(180deg)';
  }
}

/* Cart */
function getCart() {
  try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
  catch { return []; }
}
function saveCart(cart) {
  localStorage.setItem(CART_KEY, JSON.stringify(cart));
}
function updateCartBadge() {
  const cart  = getCart();
  const total = cart.reduce((sum, i) => sum + i.qty, 0);
  const badge = document.getElementById('cart-badge');
  if (!badge) return;
  badge.textContent   = total;
  badge.style.display = total > 0 ? 'inline-flex' : 'none';
}

/* Favourites */
function getFavourites() {
  try { return JSON.parse(localStorage.getItem(FAV_KEY)) || []; }
  catch { return []; }
}
function saveFavourites(favs) {
  localStorage.setItem(FAV_KEY, JSON.stringify(favs));
}

function toggleHeart(btn) {
  const img   = btn.querySelector('img');
  const empty = img.dataset.state === 'empty';

  img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
  img.dataset.state = empty ? 'filled' : 'empty';

  const card   = btn.closest('[class*="2d2b3d"]');
  const name   = card?.querySelector('p.text-white')?.textContent?.trim() || '';
  const price  = parseInt(card?.querySelector('span.text-\\[\\#f5a800\\]')?.textContent || '0', 10);
  const imgSrc = card?.querySelector('img.anim-float, img.object-contain')?.src || '';
  if (!name) return;

  let favs = getFavourites();
  if (empty) {
    if (!favs.find(f => f.name === name)) {
      favs.push({ name, price, img: imgSrc, addedAt: new Date().toISOString() });
    }
  } else {
    favs = favs.filter(f => f.name !== name);
  }
  saveFavourites(favs);
}

function syncHeartStates() {
  const favs = getFavourites();
  document.querySelectorAll('button[onclick="toggleHeart(this)"]').forEach(btn => {
    const img  = btn.querySelector('img');
    const card = btn.closest('[class*="2d2b3d"]');
    const name = card?.querySelector('p.text-white')?.textContent?.trim();
    if (!name || !img) return;
    const isFav       = !!favs.find(f => f.name === name);
    img.src           = isFav ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
    img.dataset.state = isFav ? 'filled' : 'empty';
  });
}

/* Accordion */
function toggle(id) {
  const body  = document.getElementById('b-' + id);
  const arrow = document.getElementById('arrow-' + id);
  const isOpen = body.dataset.open === '1';
  if (isOpen) {
    body.style.maxHeight  = '0';
    body.dataset.open     = '0';
    arrow.style.transform = 'rotate(0deg)';
  } else {
    body.style.maxHeight  = body.scrollHeight + 'px';
    body.dataset.open     = '1';
    arrow.style.transform = 'rotate(180deg)';
  }
}

/* Add to Cart dari halaman main */
function toggleAdded(btn) {
  const card  = btn.closest('.bg-\\[\\#2d2b3d\\]') || btn.closest('[class*="2d2b3d"]');
  const name  = card?.querySelector('p.text-white')?.textContent?.trim() || 'Produk';
  const price = parseInt(card?.querySelector('span.text-\\[\\#f5a800\\]')?.textContent || '0', 10);
  const img   = card?.querySelector('img.anim-float, img.object-contain')?.src || '';

  // Cari product_id dari PRODUCT_MAP
  const productEntry = PRODUCT_MAP[name];
  const productId    = productEntry ? productEntry.id : null;

  const added = btn.dataset.added === '1';

  if (!added) {
    const cart     = getCart();
    const existing = cart.find(i => i.name === name);
    if (existing) {
      existing.qty += 1;
    } else {
      cart.push({
        product_id: productId,
        name,
        price,
        img,
        qty: 1,
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
    btn.textContent   = 'Add to cart';
    btn.dataset.added = '0';
    btn.style.color   = '';
  }

  updateCartBadge();
}

/* Daily Task */
function toggleTask(el) {
  const done = el.dataset.done === '1';
  el.dataset.done      = done ? '' : '1';
  el.style.background  = done ? '' : '#7b5fff';
  el.style.borderColor = done ? '#4a4870' : '#7b5fff';

  const iconDiv = el.querySelector('.text-2xl');
  if (iconDiv) {
    if (done) {
      const originalIcons = {
        0: '<img src="/assets/img/The amazing hyena.png" class="w-8 h-8">',
        1: '<img src="/assets/img/World travel.png" class="w-8 h-8">',
        2: '<img src="/assets/img/Grandmas Recipe.png" class="w-8 h-8">'
      };
      const index = Array.from(el.parentElement.children).indexOf(el);
      iconDiv.innerHTML = originalIcons[index] || originalIcons[0];
    } else {
      iconDiv.innerHTML = '<img src="/assets/img/check.png" class="w-6 h-6">';
    }
  }
}

/* Progress bar */
window.addEventListener('load', () => {
  setTimeout(() => {
    const progBar = document.getElementById('prog-bar');
    if (progBar) progBar.style.width = '42%';
  }, 500);
});

/* Sync cart button states */
function syncButtonStates() {
  const cart = getCart();
  document.querySelectorAll('[onclick="toggleAdded(this)"]').forEach(btn => {
    const card = btn.closest('[class*="2d2b3d"]');
    const name = card?.querySelector('p.text-white')?.textContent?.trim();
    if (name && cart.find(i => i.name === name)) {
      btn.textContent   = 'Added ✓';
      btn.dataset.added = '1';
      btn.style.color   = '#a78bfa';
    }
  });
}

/* Bind klik gambar produk - halaman detail */
function bindProductImages() {
  document.querySelectorAll('[class*="2d2b3d"]').forEach(card => {
    const nameEl = card.querySelector('p.text-white');
    if (!nameEl) return;

    const name    = nameEl.textContent.trim();
    const product = PRODUCT_MAP[name];
    if (!product) return;

    const imgWrapper = card.querySelector('.bg-white.rounded-xl, div.w-full.h-full.bg-white');
    if (!imgWrapper || imgWrapper.dataset.bound) return;
    imgWrapper.dataset.bound = '1';
    imgWrapper.style.cursor  = 'pointer';
    imgWrapper.addEventListener('click', (e) => {
      if (e.target.closest('button')) return;
      window.location.href = `/main/detail/${product.id}`;
    });
  });
}

/* Sort & Delete */
function sortProducts() {
  const grid      = document.getElementById('product-grid');
  const cards     = Array.from(document.querySelectorAll('.product-card'));
  const sortValue = document.getElementById('sortSelect').value;
  cards.sort((a, b) => {
    const dateA   = new Date(a.dataset.date);
    const dateB   = new Date(b.dataset.date);
    const boughtA = parseInt(a.dataset.bought);
    const boughtB = parseInt(b.dataset.bought);
    switch (sortValue) {
      case 'latest':      return dateB - dateA;
      case 'oldest':      return dateA - dateB;
      case 'mostBought':  return boughtB - boughtA;
      case 'leastBought': return boughtA - boughtB;
      default:            return 0;
    }
  });
  cards.forEach(card => grid.appendChild(card));
}

function toggleSortMenu() {
  const menu  = document.getElementById('sortMenu');
  const arrow = document.getElementById('sortArrow');
  const opened = menu.classList.contains('max-h-40');
  if (opened) {
    menu.classList.remove('max-h-40', 'opacity-100');
    menu.classList.add('max-h-0', 'opacity-0');
    arrow.classList.remove('rotate-0');
    arrow.classList.add('rotate-180');
  } else {
    menu.classList.remove('max-h-0', 'opacity-0');
    menu.classList.add('max-h-40', 'opacity-100');
    arrow.classList.remove('rotate-180');
    arrow.classList.add('rotate-0');
  }
}

function deleteAllCards() {
  const cards = document.querySelectorAll('.product-card');
  if (cards.length === 0) { alert('No cards left.'); return; }
  if (!confirm('Delete all recommended products?')) return;
  cards.forEach((card, index) => {
    setTimeout(() => {
      card.style.transition = 'all .4s ease';
      card.style.opacity    = '0';
      card.style.transform  = 'scale(.9)';
      card.style.height     = '0px';
      card.style.margin     = '0px';
      card.style.padding    = '0px';
      card.style.overflow   = 'hidden';
      setTimeout(() => card.remove(), 400);
    }, index * 100);
  });
  setTimeout(() => alert('All products deleted successfully.'), cards.length * 100 + 500);
}

/* Init */
document.addEventListener('DOMContentLoaded', () => {
  syncButtonStates();
  syncHeartStates();
  updateCartBadge();
  bindProductImages();

  ['perks', 'prog', 'daily'].forEach(id => {
    const body = document.getElementById('body-' + id);
    if (body) body.style.maxHeight = body.scrollHeight + 'px';
  });

  const recBody = document.getElementById('b-rec');
  if (recBody) recBody.style.maxHeight = recBody.scrollHeight + 'px';
});