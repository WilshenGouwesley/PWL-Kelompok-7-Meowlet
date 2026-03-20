<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet – Cart</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
</head>
<body style="font-family:'Koh Santepheap',sans-serif" class="bg-[#2d2b3d] text-[#b0aec8] min-h-screen">

  <!-- NAVBAR -->
  <nav class="bg-[#1e1c2e] sticky top-0 z-50 w-full flex items-center justify-between px-8 h-[54px] border-b border-white/5">
    <div style="font-family:'Fredoka One',cursive" class="w-32 flex items-center gap-2">
      <img src="/assets/img/logo.png" alt="logo">
    </div>

    <ul class="flex gap-8 list-none m-0 p-0 text-[.88rem]">
      <li><a href="/main" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Dashboard</a></li>
      <li><a href="#" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Earn</a></li>
      <li><a href="/products" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Products</a></li>
      <li><a href="/cart" class="text-white font-bold border-b-2 border-white pb-0.5 no-underline">Cart</a></li>
      <li><a href="#" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">About</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <div class="flex items-center gap-1.5 px-3.5 py-1 text-#FFFF00 font-extrabold text-[.9rem]">
        2.203
      </div>
      <div class="w-7 h-7 rounded-full flex items-center justify-center">
        <img src="/assets/img/point.png" alt="point">
      </div>
      <div class="w-8 h-8 rounded-full flex items-center justify-center">
        <img src="/assets/img/profile.png" alt="avatar" class="w-full h-full object-cover" id="nav-avatar"/>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <div class="px-16 pt-12 pb-8">

    <!-- Page Header -->
    <section class="mb-8">
      <h1 class="text-white font-extrabold text-[2rem] flex items-center gap-3 mb-2">
        <a href="/main" class="text-[#a78bfa] hover:text-white transition-colors text-[1.6rem]">&lt;</a>
        Cart
      </h1>
      <p class="text-[#7a78a0] text-[.9rem] leading-relaxed">
        Explore a complete record of your purchases, review detailed information for each transaction,<br/>
        and stay updated on shipping progress.
      </p>
    </section>

    <!-- Your Orders -->
    <section class="mb-8">
      <h2 class="text-white font-extrabold text-[1.2rem] mb-4">Your orders</h2>

      <div id="cart" class="space-y-3">

        <!-- ITEM 1 -->
        <div class="item flex items-center justify-between bg-[#3a3852] rounded-xl px-5 py-4">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-white flex-shrink-0 overflow-hidden">
              <img src="/assets/img/pen.png" class="w-full h-full object-contain p-1" alt="Pen SmoothWrite">
            </div>
            <div>
              <p class="text-white font-bold text-[.95rem]">Pen SmoothWrite 0.5mm</p>
              <div class="flex items-center gap-1.5 mt-0.5">
                <img src="/assets/img/point.png" class="w-4 h-4" alt="point">
                <span class="price text-[#f5a800] font-extrabold text-[.9rem]">150</span>
              </div>
              <p class="text-[#7a78a0] text-[.72rem] mt-0.5">Order no. 220309</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="flex items-center bg-[#2d2b3d] rounded-xl overflow-hidden">
              <button onclick="changeQty(this,-1)" class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">−</button>
              <span class="qty px-3 text-white font-bold text-[.9rem] min-w-[28px] text-center">1</span>
              <button onclick="changeQty(this,1)"  class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">+</button>
            </div>
            <button onclick="deleteItem(this)" class="w-9 h-9 rounded-xl bg-[#2d2b3d] hover:bg-red-500/20 text-[#7a78a0] hover:text-red-400 flex items-center justify-center transition-all">
              <img src="/assets/img/trash-can.png" class="w-4 h-4" alt="delete">
            </button>
          </div>
        </div>

        <!-- ITEM 2 -->
        <div class="item flex items-center justify-between bg-[#3a3852] rounded-xl px-5 py-4">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-white flex-shrink-0 overflow-hidden">
              <img src="/assets/img/cat-paw-stapler.png" class="w-full h-full object-contain p-1" alt="Premium Cat Stapler">
            </div>
            <div>
              <p class="text-white font-bold text-[.95rem]">Premium Cat Stapler</p>
              <div class="flex items-center gap-1.5 mt-0.5">
                <img src="/assets/img/point.png" class="w-4 h-4" alt="point">
                <span class="price text-[#f5a800] font-extrabold text-[.9rem]">610</span>
              </div>
              <p class="text-[#7a78a0] text-[.72rem] mt-0.5">Order no. 281928</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="flex items-center bg-[#2d2b3d] rounded-xl overflow-hidden">
              <button onclick="changeQty(this,-1)" class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">−</button>
              <span class="qty px-3 text-white font-bold text-[.9rem] min-w-[28px] text-center">1</span>
              <button onclick="changeQty(this,1)"  class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">+</button>
            </div>
            <button onclick="deleteItem(this)" class="w-9 h-9 rounded-xl bg-[#2d2b3d] hover:bg-red-500/20 text-[#7a78a0] hover:text-red-400 flex items-center justify-center transition-all">
              <img src="/assets/img/trash-can.png" class="w-4 h-4" alt="delete">
            </button>
          </div>
        </div>

        <!-- ITEM 3 -->
        <div class="item flex items-center justify-between bg-[#3a3852] rounded-xl px-5 py-4">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-white flex-shrink-0 overflow-hidden">
              <img src="/assets/img/cat_paw_eraser.png" class="w-full h-full object-contain p-1" alt="Cat Paw Sharpener">
            </div>
            <div>
              <p class="text-white font-bold text-[.95rem]">Cat Paw Sharpener</p>
              <div class="flex items-center gap-1.5 mt-0.5">
                <img src="/assets/img/point.png" class="w-4 h-4" alt="point">
                <span class="price text-[#f5a800] font-extrabold text-[.9rem]">300</span>
              </div>
              <p class="text-[#7a78a0] text-[.72rem] mt-0.5">Order no. 062793</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="flex items-center bg-[#2d2b3d] rounded-xl overflow-hidden">
              <button onclick="changeQty(this,-1)" class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">−</button>
              <span class="qty px-3 text-white font-bold text-[.9rem] min-w-[28px] text-center">1</span>
              <button onclick="changeQty(this,1)"  class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">+</button>
            </div>
            <button onclick="deleteItem(this)" class="w-9 h-9 rounded-xl bg-[#2d2b3d] hover:bg-red-500/20 text-[#7a78a0] hover:text-red-400 flex items-center justify-center transition-all">
              <img src="/assets/img/trash-can.png" class="w-4 h-4" alt="delete">
            </button>
          </div>
        </div>

        <!-- ITEM 4 -->
        <div class="item flex items-center justify-between bg-[#3a3852] rounded-xl px-5 py-4">
          <div class="flex items-center gap-4">
            <div class="w-14 h-14 rounded-xl bg-white flex-shrink-0 overflow-hidden">
              <img src="/assets/img/immanuel-big-blue-book.png" class="w-full h-full object-contain p-1" alt="Immanuel Big Blue Book">
            </div>
            <div>
              <p class="text-white font-bold text-[.95rem]">Immanuel Big Blue Book</p>
              <div class="flex items-center gap-1.5 mt-0.5">
                <img src="/assets/img/point.png" class="w-4 h-4" alt="point">
                <span class="price text-[#f5a800] font-extrabold text-[.9rem]">410</span>
              </div>
              <p class="text-[#7a78a0] text-[.72rem] mt-0.5">Order no. 581022</p>
            </div>
          </div>
          <div class="flex items-center gap-4">
            <div class="flex items-center bg-[#2d2b3d] rounded-xl overflow-hidden">
              <button onclick="changeQty(this,-1)" class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">−</button>
              <span class="qty px-3 text-white font-bold text-[.9rem] min-w-[28px] text-center">1</span>
              <button onclick="changeQty(this,1)"  class="w-9 h-9 text-[#a78bfa] font-extrabold text-lg hover:bg-[#4a4870] transition-colors">+</button>
            </div>
            <button onclick="deleteItem(this)" class="w-9 h-9 rounded-xl bg-[#2d2b3d] hover:bg-red-500/20 text-[#7a78a0] hover:text-red-400 flex items-center justify-center transition-all">
              <img src="/assets/img/trash-can.png" class="w-4 h-4" alt="delete">
            </button>
          </div>
        </div>

        <!-- Empty state -->
        <div id="empty-cart" class="hidden flex flex-col items-center justify-center py-12 text-center">
          <div class="mb-4">
            <img src="/assets/img/cart.png" class="w-16 h-16">
          </div>
          <p class="text-[#7a78a0] font-semibold">Your cart is empty</p>
        </div>

      </div>
    </section>

    <!-- Subtotal & Actions -->
    <section class="flex items-center justify-between pt-6 border-t border-[#3a3852]">
      <div class="flex items-center gap-3">
        <span class="text-white font-extrabold text-[1.1rem]">SubTotal</span>
        <span class="text-[#4a4870] font-bold text-[1.1rem]">|</span>
        <div class="flex items-center gap-2">
          <img src="/assets/img/point.png" class="w-8 h-8" alt="point">
          <span id="subtotal" class="text-[#f5a800] font-extrabold text-[1.5rem]">0</span>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <button class="bg-gradient-to-b from-[#302E3E] to-[#5B57A5] hover:opacity-90 text-white font-bold text-[.88rem] px-6 py-2.5 rounded-xl transition-all hover:scale-105">
          Order Now
        </button>
        <button class="border border-[#4a4870] hover:border-[#a78bfa] text-[#b0aec8] hover:text-white font-semibold text-[.88rem] px-6 py-2.5 rounded-xl transition-all hover:scale-105">
          Back
        </button>
      </div>
    </section>

  </div>

  <!-- PROMO -->
  <div class="bg-[#1e1c2e] rounded-2xl mt-6 mx-8 p-10 flex items-center justify-between gap-8">
    <h2 style="font-family:'Fredoka One',cursive" class="text-[1.8rem] text-white leading-tight">Powered by Skills<br>Not Money</h2>
    <div class="max-w-[360px]">
      <p class="text-[.8rem] font-bold text-[#a78bfa] mb-2">Stuff for Schools and Studies</p>
      <p class="text-[.77rem] text-[#7a78a0] leading-relaxed">Every activity in this marketplace is automatically recorded and can be monitored, so that the process of exchanging goods and services is honest, safe, and responsible.</p>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="bg-[#1e1c2e] px-8 pt-8 pb-5 mt-6">
    <div class="flex gap-16 mb-8">
      <div>
        <h4 class="text-[.85rem] font-extrabold text-white mb-3">About</h4>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] mb-2 no-underline hover:text-white transition-colors">Blog</a>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] mb-2 no-underline hover:text-white transition-colors">Meet The Team</a>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] no-underline hover:text-white transition-colors">Contact Us</a>
      </div>
      <div>
        <h4 class="text-[.85rem] font-extrabold text-white mb-3">Support</h4>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] mb-2 no-underline hover:text-white transition-colors">Contact Us</a>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] mb-2 no-underline hover:text-white transition-colors">Return</a>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] mb-2 no-underline hover:text-white transition-colors">FAQ</a>
        <a href="#" class="block text-[#7a78a0] text-[.8rem] no-underline hover:text-white transition-colors">Help</a>
      </div>
      <div class="ml-auto text-right">
        <h4 class="text-[.85rem] font-extrabold text-white mb-3">Social Media</h4>
        <div class="flex gap-2 justify-end">
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] flex items-center justify-center hover:bg-[#4a4870] transition-all">
            <img src="/assets/img/twitter.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] flex items-center justify-center hover:bg-[#4a4870] transition-all">
            <img src="/assets/img/facebook.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] flex items-center justify-center hover:bg-[#4a4870] transition-all">
            <img src="/assets/img/instagram.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] flex items-center justify-center hover:bg-[#4a4870] transition-all">
            <img src="/assets/img/linkedin.png" class="w-5 h-5">
          </button>
        </div>
      </div>
    </div>
    <div class="flex justify-between items-center border-t border-[#3a3852] pt-4 text-[.72rem] text-[#5a5880]">
      <span>Copyright 2026... All Right Reserved.</span>
      <a href="#" class="text-[#7a78a0] no-underline hover:text-white transition-colors">Privacy Policy</a>
    </div>
  </footer>

  <script>
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
  </script>
</body>
</html>