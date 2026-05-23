   const CART_KEY = 'meowlet_cart';

   // Map nama produk - product_id untuk keperluan order ke DB
   const PRODUCT_MAP = {
     'Cat Paw Sharpener':        { id: 1 },
     'Pen SmoothWrite 0.5 mm':   { id: 2 },
     'Cat Paw Stapler':          { id: 3 },
     'Immanuel Big Blue Book':   { id: 4 },
     'Immanuel Math Book':       { id: 5 },
     'Premium Crochet Red Yarn': { id: 6 },
   };
   
   /* Helpers */
   function getCart() {
     try { return JSON.parse(localStorage.getItem(CART_KEY)) || []; }
     catch { return []; }
   }
   function saveCart(cart) {
     localStorage.setItem(CART_KEY, JSON.stringify(cart));
   }
   
   /* Cart Badge */
   function updateCartBadge() {
     const cart  = getCart();
     const total = cart.reduce((sum, i) => sum + i.qty, 0);
     const badge = document.getElementById('cart-badge');
     if (!badge) return;
     badge.textContent   = total;
     badge.style.display = total > 0 ? 'inline-flex' : 'none';
   }
   
   /* Category Filter */
   function toggleCategory(btn) {
     const isActive = btn.dataset.active === '1';
     const circle   = btn.querySelector('.cat-circle');
     const label    = btn.querySelector('.cat-label');
     const badge    = btn.querySelector('.cat-badge');
   
     btn.dataset.active      = isActive ? '0' : '1';
     circle.style.background = isActive ? '#4a4870' : '#6b5fff';
     circle.style.boxShadow  = isActive ? 'none' : '0 8px 20px rgba(107,95,255,.35)';
     label.style.color       = isActive ? '#7a78a0' : '#fff';
     label.style.fontWeight  = isActive ? '600' : '700';
     badge.style.display     = isActive ? 'none' : 'flex';
   
     filterProducts();
   }
   
   /* Core Filter (kategori + search) */
   function filterProducts() {
     const query = (document.getElementById('search-input')?.value || '').toLowerCase().trim();
   
     const activeCats = [];
     document.querySelectorAll('.cat-btn[data-active="1"]').forEach(btn => {
       activeCats.push(btn.dataset.cat.toLowerCase());
     });
   
     const cards   = document.querySelectorAll('.product-card');
     let   visible = 0;
   
     cards.forEach(card => {
       const name = (card.dataset.name || '').toLowerCase();
       const tags = (card.dataset.tags || '').toLowerCase().split(',').map(t => t.trim());
   
       const catMatch    = activeCats.length === 0
         || activeCats.some(cat => tags.includes(cat) || tags.some(t => t.includes(cat)));
       const searchMatch = !query || name.includes(query) || tags.some(t => t.includes(query));
   
       if (catMatch && searchMatch) { card.style.display = ''; visible++; }
       else                         { card.style.display = 'none'; }
     });
   
     const emptyEl = document.getElementById('empty-state');
     if (emptyEl) emptyEl.classList.toggle('hidden', visible > 0);
   }
   
   /* Heart / Wishlist */
   function toggleHeart(btn) {
     const img   = btn.querySelector('img');
     const empty = img.dataset.state === 'empty';
     img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
     img.dataset.state = empty ? 'filled' : 'empty';
   }
   
   /* Add to Cart */
   function toggleAdded(btn) {
     const card  = btn.closest('.product-card');
     const name  = card?.querySelector('p.text-white')?.textContent?.trim() || 'Produk';
     const price = parseInt(card?.querySelector('span.text-\\[\\#f5a800\\]')?.textContent || '0', 10);
     const img   = card?.querySelector('img.anim-float')?.src || '';
   
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
       btn.textContent   = 'Add to Cart';
       btn.dataset.added = '0';
       btn.style.color   = '';
     }
   
     updateCartBadge();
   }
   
   /* Sync button states saat halaman dimuat */
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
   
   /* Init */
   document.addEventListener('DOMContentLoaded', () => {
     syncButtonStates();
     updateCartBadge();
     filterProducts();
   });