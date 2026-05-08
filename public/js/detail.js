/* ============================================================
   detail.js  —  Halaman Detail Produk
   - Ganti gambar utama via thumbnail
   - Tab Description / Reviews
   - Heart / Wishlist toggle
   - Add to Cart → localStorage
   - Klik card "Another Products" → /main/detail/{id}
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
     badge.textContent   = total;
     badge.style.display = total > 0 ? 'inline-flex' : 'none';
   }
   
   /* ---------- Ganti gambar utama ---------- */
   function changeImg(btn, src) {
     document.getElementById('main-img').src = src;
   
     /* Reset semua border thumbnail */
     document.querySelectorAll('.thumb-btn').forEach(b => {
       b.classList.remove('border-[#6b5fff]');
       b.classList.add('border-transparent');
     });
   
     /* Aktifkan border thumbnail yang diklik */
     btn.classList.remove('border-transparent');
     btn.classList.add('border-[#6b5fff]');
   }
   
   /* ---------- Tab switch ---------- */
   function switchTab(tab) {
     const tabs   = { desc: 'panel-desc', rev: 'panel-rev' };
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
   
   /* ---------- Heart / Wishlist (tombol lingkaran kanan) ---------- */
   function toggleWishlist(btn) {
     const img   = document.getElementById('heart-icon') || btn.querySelector('img');
     const empty = img.dataset.state === 'empty';
   
     img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
     img.dataset.state = empty ? 'filled' : 'empty';
   
     /* Ubah border tombol */
     if (empty) {
       btn.classList.add('border-[#a78bfa]');
       btn.classList.remove('border-[#4a4870]');
     } else {
       btn.classList.remove('border-[#a78bfa]');
       btn.classList.add('border-[#4a4870]');
     }
   }
   
   /* ---------- Heart di card "Another Products" ---------- */
   function toggleHeart(btn) {
     const img   = btn.querySelector('img');
     const empty = img.dataset.state === 'empty';
   
     img.src           = empty ? '/assets/img/filled-heart.png' : '/assets/img/unfilled-heart.png';
     img.dataset.state = empty ? 'filled' : 'empty';
   }
   
   /* ---------- Add to Cart (tombol utama) ---------- */
   function addMainProductToCart() {
     /* Ambil data dari halaman */
     const name  = document.querySelector('h1')?.textContent?.trim() || 'Produk';
     const price = parseInt(document.querySelector('.text-white.font-extrabold.text-\\[2rem\\]')?.textContent || '0', 10);
     const img   = document.getElementById('main-img')?.src || '';
   
     const cart     = getCart();
     const existing = cart.find(i => i.name === name);
   
     const addBtn = document.querySelector('[data-role="add-to-cart"]');
   
     if (existing) {
       existing.qty += 1;
       saveCart(cart);
       flashAddButton(addBtn, 'Added ✓');
     } else {
       cart.push({
         name,
         price,
         img,
         qty: 1,
         orderId: Math.floor(100000 + Math.random() * 900000).toString()
       });
       saveCart(cart);
       flashAddButton(addBtn, 'Added ✓');
     }
   
     updateCartBadge();
   }
   
   /* Efek flash sementara pada tombol */
   function flashAddButton(btn, text) {
     if (!btn) return;
     const original = btn.innerHTML;
     btn.innerHTML   = `<span style="color:#6b5fff">${text}</span>`;
     btn.disabled    = true;
     setTimeout(() => {
       btn.innerHTML = original;
       btn.disabled  = false;
     }, 1500);
   }
   
   /* ---------- Sinkronisasi status tombol Add to Cart ---------- */
   function syncAddButton() {
     const name   = document.querySelector('h1')?.textContent?.trim();
     const cart   = getCart();
     const addBtn = document.querySelector('[data-role="add-to-cart"]');
     if (!addBtn || !name) return;
   
     if (cart.find(i => i.name === name)) {
       addBtn.innerHTML = `<img src="/assets/img/black-paw.png" class="w-4"> In Cart ✓`;
     }
   }
   
   /* ---------- Bind tombol "Add to Cart" utama ---------- */
   function bindAddToCartButton() {
     /* Cari tombol yang mengandung teks "Add to Cart" */
     document.querySelectorAll('button').forEach(btn => {
       if (btn.textContent.includes('Add to Cart') && !btn.dataset.role) {
         btn.dataset.role = 'add-to-cart';
         btn.addEventListener('click', addMainProductToCart);
       }
     });
   }
   
   /* ---------- Navigasi "Another Products" ---------- */
   const ANOTHER_PRODUCT_MAP = {
     'Campus Note Books (5pc)': { id: 4  },
     'Wool Brush':              { id: 7  },
     'ClearLine Ruler 30 cm':   { id: 8  },
     'Pink Bear Keychain':      { id: 9  },
   };
   
   function bindAnotherProducts() {
     document.querySelectorAll('.grid.grid-cols-4 .bg-\\[\\#3a3852\\]').forEach(card => {
       const nameEl = card.querySelector('p.text-white');
       if (!nameEl) return;
   
       const name    = nameEl.textContent.trim();
       const product = ANOTHER_PRODUCT_MAP[name];
       if (!product) return;
   
       if (card.dataset.bound) return;
       card.dataset.bound = '1';
   
       card.style.cursor = 'pointer';
       card.addEventListener('click', (e) => {
         if (e.target.closest('button')) return;
         window.location.href = `/main/detail/${product.id}`;
       });
     });
   }
   
   /* ---------- Init ---------- */
   document.addEventListener('DOMContentLoaded', () => {
     bindAddToCartButton();
     bindAnotherProducts();
     syncAddButton();
     updateCartBadge();
   });