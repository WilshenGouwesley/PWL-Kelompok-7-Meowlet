/* ============================================================
   detail.js  —  Halaman Detail Produk
   ============================================================ */

   const CART_KEY = 'meowlet_cart';

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
   
   /* Add to Cart — PRODUCT di-inject dari detail.php */
   function addToCart() {
     if (typeof PRODUCT === 'undefined') {
       console.error('PRODUCT tidak ditemukan.');
       return;
     }
   
     const cart     = getCart();
     const existing = cart.findIndex(i => i.product_id === PRODUCT.product_id);
   
     if (existing >= 0) {
       cart[existing].qty += 1;
     } else {
       cart.push({ ...PRODUCT, img: '/assets/img/' + PRODUCT.image, qty: 1 });
     }
   
     saveCart(cart);
     updateCartBadge();
   
     // Feedback visual
     const btn  = document.getElementById('btn-add-cart');
     const orig = btn.innerHTML;
     btn.innerHTML = '<span style="color:#6b5fff">Added ✓</span>';
     btn.disabled  = true;
     setTimeout(() => { btn.innerHTML = orig; btn.disabled = false; }, 1200);
   }
   
   /* Sync tombol jika produk sudah ada di cart */
   function syncAddButton() {
     if (typeof PRODUCT === 'undefined') return;
     const cart = getCart();
     const btn  = document.getElementById('btn-add-cart');
     if (!btn) return;
     if (cart.find(i => i.product_id === PRODUCT.product_id)) {
       btn.innerHTML = '<img src="/assets/img/black-paw.png" class="w-4"> In Cart ✓';
     }
   }
   
   /* Ganti gambar utama */
   function changeImg(btn, src) {
     document.getElementById('main-img').src = src;
     document.querySelectorAll('.thumb-btn').forEach(b => {
       b.classList.remove('border-[#6b5fff]');
       b.classList.add('border-transparent');
     });
     btn.classList.remove('border-transparent');
     btn.classList.add('border-[#6b5fff]');
   }
   
   /* Tab switch */
   function switchTab(tab) {
     const tabs    = { desc: 'panel-desc', rev: 'panel-rev' };
     const tabBtns = { desc: 'tab-desc',  rev: 'tab-rev'  };
     Object.entries(tabs).forEach(([key, panelId]) => {
       const panel  = document.getElementById(panelId);
       const tabBtn = document.getElementById(tabBtns[key]);
       if (!panel || !tabBtn) return;
       if (key === tab) {
         panel.classList.remove('hidden');
         tabBtn.classList.add('text-[#a78bfa]', 'border-[#a78bfa]');
         tabBtn.classList.remove('text-[#7a78a0]', 'border-transparent');
       } else {
         panel.classList.add('hidden');
         tabBtn.classList.remove('text-[#a78bfa]', 'border-[#a78bfa]');
         tabBtn.classList.add('text-[#7a78a0]', 'border-transparent');
       }
     });
   }
   
   /* Heart / Wishlist */
   function toggleWishlist(btn) {
     const img   = document.getElementById('heart-icon') || btn.querySelector('img');
     const empty = img.dataset.state === 'empty';
     img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
     img.dataset.state = empty ? 'filled' : 'empty';
     if (empty) {
       btn.classList.add('border-[#a78bfa]');
       btn.classList.remove('border-[#4a4870]');
     } else {
       btn.classList.remove('border-[#a78bfa]');
       btn.classList.add('border-[#4a4870]');
     }
   }
   
   /* Heart di card "Another Products" */
   function toggleHeart(btn) {
     const img   = btn.querySelector('img');
     const empty = img.dataset.state === 'empty';
     img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
     img.dataset.state = empty ? 'filled' : 'empty';
   }
   
   /* Navigasi "Another Products" */
   const ANOTHER_PRODUCT_MAP = {
     'Campus Note Books (5pc)': { id: 4 },
     'Wool Brush':              { id: 7 },
     'ClearLine Ruler 30 cm':   { id: 8 },
     'Pink Bear Keychain':      { id: 9 },
   };
   
   function bindAnotherProducts() {
     document.querySelectorAll('.grid.grid-cols-4 .bg-\\[\\#3a3852\\]').forEach(card => {
       const nameEl = card.querySelector('p.text-white');
       if (!nameEl) return;
       const name    = nameEl.textContent.trim();
       const product = ANOTHER_PRODUCT_MAP[name];
       if (!product || card.dataset.bound) return;
       card.dataset.bound = '1';
       card.style.cursor  = 'pointer';
       card.addEventListener('click', (e) => {
         if (e.target.closest('button')) return;
         window.location.href = `/main/detail/${product.id}`;
       });
     });
   }
   
   /* Init */
   document.addEventListener('DOMContentLoaded', () => {
     syncAddButton();
     bindAnotherProducts();
     updateCartBadge();
   });