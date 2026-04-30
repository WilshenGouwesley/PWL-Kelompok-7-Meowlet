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

  <script src="/js/cart.js">
    
  </script>