function updateSubtotal() {
    let total = 0;
    document.querySelectorAll('#cart .item').forEach(item => {
      const qty   = parseInt(item.querySelector('.qty').textContent) || 0;
      const price = parseInt(item.querySelector('.price').textContent) || 0;
      total += qty * price;
    });
    document.getElementById('subtotal').textContent = total.toLocaleString('id-ID');
    document.getElementById('empty-cart').classList.toggle('hidden', document.querySelectorAll('#cart .item').length > 0);
  }

  function changeQty(btn, delta) {
    const qtyEl = btn.closest('.flex').querySelector('.qty');
    qtyEl.textContent = Math.max(1, parseInt(qtyEl.textContent) + delta);
    updateSubtotal();
  }

  function deleteItem(btn) {
    btn.closest('.item').remove();
    updateSubtotal();
  }

  updateSubtotal();

/* ============================================================
   cart.js  —  Halaman Cart
   - Render item dari localStorage
   - Qty change, delete item, subtotal
   - Order Now → popup sukses → clear cart
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
   
   /* ---------- Subtotal ---------- */
   function updateSubtotal() {
     const cart  = getCart();
     const total = cart.reduce((sum, i) => sum + i.price * i.qty, 0);
     document.getElementById('subtotal').textContent = total;
   }
   
   /* ---------- Empty state ---------- */
   function checkEmpty() {
     const cart    = getCart();
     const emptyEl = document.getElementById('empty-cart');
     if (cart.length === 0) {
       document.querySelectorAll('#cart .item').forEach(el => el.remove());
       if (emptyEl) emptyEl.classList.remove('hidden');
     } else {
       if (emptyEl) emptyEl.classList.add('hidden');
     }
   }
   
   /* ---------- Render cart dari localStorage ---------- */
   function renderCart() {
     const cart      = getCart();
     const container = document.getElementById('cart');
     if (!container) return;
   
     container.querySelectorAll('.item').forEach(el => el.remove());
   
     const emptyEl = document.getElementById('empty-cart');
   
     if (cart.length === 0) {
       if (emptyEl) emptyEl.classList.remove('hidden');
       updateSubtotal();
       return;
     }
   
     if (emptyEl) emptyEl.classList.add('hidden');
   
     cart.forEach(item => {
       const div = document.createElement('div');
       div.className = 'item flex items-center justify-between bg-[#3a3852] rounded-xl px-5 py-4';
       div.dataset.name = item.name;
   
       div.innerHTML = `
         <div class="flex items-center gap-4">
           <div class="w-14 h-14 rounded-xl bg-white flex-shrink-0 overflow-hidden">
             <img src="${item.img}" class="w-full h-full object-contain p-1" alt="${item.name}">
           </div>
           <div>
             <p class="text-white font-bold text-[.95rem]">${item.name}</p>
             <div class="flex items-center gap-1.5 mt-0.5">
               <img src="/assets/img/point.png" class="w-4 h-4" alt="point">
               <span class="price text-[#f5a800] font-extrabold text-[.9rem]">${item.price}</span>
             </div>
             <p class="text-[#7a78a0] text-[.72rem] mt-0.5">Order no. ${item.orderId}</p>
           </div>
         </div>
         <div class="flex items-center gap-4">
           <div class="flex items-center bg-[#2d2b3d] rounded-xl overflow-hidden">
             <button onclick="changeQty(this,-1)" class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">−</button>
             <span class="qty px-3 text-white font-bold text-[.9rem] min-w-[28px] text-center">${item.qty}</span>
             <button onclick="changeQty(this,1)"  class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">+</button>
           </div>
           <button onclick="deleteItem(this)" class="w-9 h-9 rounded-xl bg-[#2d2b3d] hover:bg-red-500/20 text-[#7a78a0] hover:text-red-400 flex items-center justify-center transition-all">
             <img src="/assets/img/trash-can.png" class="w-4 h-4" alt="delete">
           </button>
         </div>
       `;
   
       container.insertBefore(div, emptyEl);
     });
   
     updateSubtotal();
   }
   
   /* ---------- Ubah qty ---------- */
   function changeQty(btn, delta) {
     const item  = btn.closest('.item');
     const name  = item.dataset.name;
     const cart  = getCart();
     const entry = cart.find(i => i.name === name);
     if (!entry) return;
   
     entry.qty = Math.max(1, entry.qty + delta);
     saveCart(cart);
   
     item.querySelector('.qty').textContent = entry.qty;
     updateSubtotal();
   }
   
   /* ---------- Hapus item ---------- */
   function deleteItem(btn) {
     const item = btn.closest('.item');
     const name = item.dataset.name;
   
     let cart = getCart();
     cart     = cart.filter(i => i.name !== name);
     saveCart(cart);
   
     item.remove();
     checkEmpty();
     updateSubtotal();
   }
   
   /* ---------- Popup Sukses ---------- */
   function injectSuccessModal() {
     if (document.getElementById('success-overlay')) return;
   
     const overlay = document.createElement('div');
     overlay.id = 'success-overlay';
     overlay.style.cssText = `
       position: fixed; inset: 0; z-index: 9999;
       display: flex; align-items: center; justify-content: center;
       background: rgba(0,0,0,0.55);
       opacity: 0; transition: opacity .25s ease;
     `;
   
     overlay.innerHTML = `
       <div id="success-card" style="
         background: #5B57A5;
         border-radius: 22px;
         padding: 40px 36px 32px;
         width: 320px;
         text-align: center;
         transform: scale(.88);
         transition: transform .28s cubic-bezier(.34,1.56,.64,1);
         box-shadow: 0 24px 60px rgba(0,0,0,.35);
       ">
         <img src="/assets/img/Lencana.png" alt="success" style="width:96px;height:96px;object-fit:contain;margin:0 auto 20px;">
         <p style="color:#fff;font-size:1.5rem;font-weight:900;letter-spacing:.04em;margin:0 0 10px;">SUCCESS</p>
         <p style="color:rgba(255,255,255,.88);font-size:.92rem;font-weight:500;margin:0 0 4px;line-height:1.5;">
           Thank you, your order is being processed.
         </p>
         <p style="color:rgba(255,255,255,.6);font-size:.78rem;margin:0 0 28px;">
           Claim it at the School's Cooperative.
         </p>
         <button onclick="closeSuccessModal()" style="
           background: transparent;
           border: 2px solid rgba(255,255,255,.75);
           color: #fff;
           font-weight: 700;
           font-size: .95rem;
           border-radius: 50px;
           padding: 10px 52px;
           cursor: pointer;
           transition: background .18s, border-color .18s;
         "
         onmouseover="this.style.background='rgba(255,255,255,.15)'"
         onmouseout="this.style.background='transparent'"
         >Okay</button>
       </div>
     `;
   
     document.body.appendChild(overlay);
   
     /* Animasi masuk */
     requestAnimationFrame(() => {
       overlay.style.opacity = '1';
       document.getElementById('success-card').style.transform = 'scale(1)';
     });
   }
   
   function closeSuccessModal() {
     const overlay = document.getElementById('success-overlay');
     const card    = document.getElementById('success-card');
     if (!overlay) return;
   
     overlay.style.opacity     = '0';
     card.style.transform      = 'scale(.88)';
   
     setTimeout(() => {
       overlay.remove();
       /* Kosongkan cart & re-render */
       saveCart([]);
       renderCart();
     }, 280);
   }
   
   function handleOrderNow() {
     const cart = getCart();
     if (cart.length === 0) return;
     injectSuccessModal();
   }
   
   /* ---------- Pasang listener ke tombol Order Now ---------- */
   function bindOrderNowButton() {
     document.querySelectorAll('button').forEach(btn => {
       if (btn.textContent.trim() === 'Order Now') {
         btn.addEventListener('click', handleOrderNow);
       }
     });
   }
   
   /* ---------- Init ---------- */
   document.addEventListener('DOMContentLoaded', () => {
     renderCart();
     bindOrderNowButton();
   });