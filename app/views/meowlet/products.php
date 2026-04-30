
  <!-- BANNER -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

    <!-- CATEGORY FILTER -->
    <div class="flex items-center justify-center gap-8 py-8">

      <!-- Stationary (active) -->
      <button onclick="toggleCategory(this)" class="cat-btn flex flex-col items-center gap-2 group" data-active="1" data-cat="stationary">
        <div class="cat-circle relative w-[62px] h-[62px] rounded-full flex items-center justify-center transition-all" style="background:#6b5fff;box-shadow:0 8px 20px rgba(107,95,255,.35)">
          <img src="/assets/img/stationary.png" class="w-[28px] h-[28px]"/>
          <span class="cat-badge absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full items-center justify-center text-white text-[.6rem] font-extrabold" style="display:flex">✕</span>
        </div>
        <span class="cat-label text-[.75rem] font-bold" style="color:#fff">Stationary</span>
      </button>

      <!-- Book (active) -->
      <button onclick="toggleCategory(this)" class="cat-btn flex flex-col items-center gap-2 group" data-active="1" data-cat="book">
        <div class="cat-circle relative w-[62px] h-[62px] rounded-full flex items-center justify-center transition-all" style="background:#6b5fff;box-shadow:0 8px 20px rgba(107,95,255,.35)">
          <img src="/assets/img/book.png" class="w-[28px] h-[28px]"/>
          <span class="cat-badge absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full items-center justify-center text-white text-[.6rem] font-extrabold" style="display:flex">✕</span>
        </div>
        <span class="cat-label text-[.75rem] font-bold" style="color:#fff">Book</span>
      </button>

      <!-- Handycraft (inactive) -->
      <button onclick="toggleCategory(this)" class="cat-btn flex flex-col items-center gap-2 group" data-active="0" data-cat="handycraft">
        <div class="cat-circle relative w-[62px] h-[62px] rounded-full flex items-center justify-center transition-all" style="background:#4a4870">
          <img src="/assets/img/handycraft.png" class="w-[28px] h-[28px]"/>
          <span class="cat-badge absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full items-center justify-center text-white text-[.6rem] font-extrabold" style="display:none">✕</span>
        </div>
        <span class="cat-label text-[.75rem] font-semibold" style="color:#7a78a0">Handycraft</span>
      </button>

      <!-- Hobbies (inactive) -->
      <button onclick="toggleCategory(this)" class="cat-btn flex flex-col items-center gap-2 group" data-active="0" data-cat="hobbies">
        <div class="cat-circle relative w-[62px] h-[62px] rounded-full flex items-center justify-center transition-all" style="background:#4a4870">
          <img src="/assets/img/hobbies.png" class="w-[28px] h-[28px]"/>
          <span class="cat-badge absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full items-center justify-center text-white text-[.6rem] font-extrabold" style="display:none">✕</span>
        </div>
        <span class="cat-label text-[.75rem] font-semibold" style="color:#7a78a0">Hobbies</span>
      </button>

      <!-- Accessories (inactive) -->
      <button onclick="toggleCategory(this)" class="cat-btn flex flex-col items-center gap-2 group" data-active="0" data-cat="accessories">
        <div class="cat-circle relative w-[62px] h-[62px] rounded-full flex items-center justify-center transition-all" style="background:#4a4870">
          <img src="/assets/img/accessories.png" class="w-[28px] h-[28px]"/>
          <span class="cat-badge absolute -top-1 -right-1 w-5 h-5 bg-red-500 rounded-full items-center justify-center text-white text-[.6rem] font-extrabold" style="display:none">✕</span>
        </div>
        <span class="cat-label text-[.75rem] font-semibold" style="color:#7a78a0">Accessories</span>
      </button>

    </div>

    <!-- SEARCH BAR -->
    <div class="flex justify-end mb-6">
      <div class="relative w-[320px]">
        <input
          type="text"
          id="search-input"
          placeholder="Search products..."
          oninput="filterProducts()"
          class="w-full bg-[#fff] text-black placeholder-[#7a78a0] text-[.88rem] font-semibold rounded-full px-5 py-2.5 pr-12 border border-[#4a4870] focus:outline-none focus:border-[#a78bfa] transition-colors"
        />
        <button class="absolute right-1 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-[#fff] flex items-center justify-center hover:bg-[#7b6fff] transition-colors">
          <img src="/assets/img/search.png" class="w-[14px] h-[14px]"/>
        </button>
      </div>
    </div>

    <!-- PRODUCT GRID -->
    <div id="product-grid" class="grid grid-cols-3 gap-4">

      <!-- Card: Cat Paw Sharpener -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="cat paw sharpener" data-tags="stationary,sharpener">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/cat_paw_eraser.png" alt="cat paw eraser" class="w-[100px] h-[120px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Cat Paw Sharpener</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Sharpener</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">610</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">+ Added</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Pen SmoothWrite 0.5mm -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="pen smoothwrite 0.5mm" data-tags="stationary,pen">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/pen.png" alt="pen smoothwrite 0.5mm" class="w-[100px] h-[100px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Pen SmoothWrite 0.5mm</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Pen</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">150</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Premium Cat Stapler -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="premium cat stapler" data-tags="stationary,stapler">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/cat-paw-stapler.png" alt="cat paw stapler" class="w-[100px] h-[100px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Premium Cat Stapler</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stapler</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">950</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Cool Matte Stapler -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="cool matte stapler" data-tags="stationary,stapler">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/cool-mate-stapler.png" alt="cool mate stapler" class="w-[120px] h-[100px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Cool Matte Stapler</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stapler</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">900</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Detail Cutting Tool -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="detail cutting tool" data-tags="stationary,tools">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/detail-cutting-tool.png" alt="detail cutting tool" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Detail Cutting Tool</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Tools</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">1500</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Joyko Scissors Stainless Steel -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="joyko scissors stainless steel" data-tags="stationary,scissors">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/joyko-scissors-stainless-steel.png" alt="joyko scissors" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Joyko Scissors Stainless Steel</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Scissors</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">1000</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Sun-Star Cat Eraser -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="sun-star cat eraser" data-tags="stationary,eraser">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/sunstar-cat-eraser.png" alt="Sun-Star Cat Eraser" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Sun-Star Cat Eraser</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Eraser</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">850</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Funny Cat Pens Black Ink -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="funny cat pens black ink" data-tags="stationary,pen">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/funny-cat-pen.png" alt="Funny Cat Pens Black Ink" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Funny Cat Pens Black Ink</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Pen</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">400</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Kitty Cat Sticky Notes -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="kitty cat sticky notes" data-tags="stationary,sticky note">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/kitty-cat-sticky-note.png" alt="Kitty Cat Sticky Notes" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Kitty Cat Sticky Notes</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Sticky Note</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">300</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Cat Paw Pastel Highlighters -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="cat paw pastel highlighters" data-tags="stationary,highlighters">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/cat-paw-pastel-highlighter.png" alt="Cat Paw Pastel Highlighters" class="w-[100px] h-[100px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Cat Paw Pastel Highlighters</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Highlighters</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">250</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Cat Silhouette PaperClip -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="cat silhouette paperclip" data-tags="stationary,paperclip">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/cat-silhouette-paperclip.png" alt="Cat Silhouette PaperClip" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Cat Silhouette PaperClip</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">PaperClip</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">100</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Card: Paws Correction Tape -->
      <div class="product-card bg-[#3a3852] rounded-2xl overflow-hidden" data-name="paws correction tape" data-tags="stationary,correction tape">
        <div class="relative bg-white rounded-xl m-2.5 mb-0 h-[170px] flex items-center justify-center overflow-hidden">
          <img src="/assets/img/paw-correction-tape.png" alt="Paws Correction Tape" class="w-[150px] h-[150px] anim-float"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty">
          </button>
        </div>
        <div class="px-3.5 pb-3.5 pt-2.5">
          <p class="text-white font-extrabold text-[1rem] leading-snug mb-2">Paws Correction Tape</p>
          <div class="flex flex-wrap gap-1.5 mb-2.5">
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
            <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Correction Tape</span>
          </div>
          <div class="flex items-center gap-1.5 mb-3">
            <img src="/assets/img/point.png" class="w-[22px] h-[22px]"/>
            <span class="text-[#f5a800] font-extrabold text-[1.05rem]">200</span>
          </div>
          <div class="flex gap-2">
            <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.78rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to Cart</button>
            <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.78rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
          </div>
        </div>
      </div>

      <!-- Empty state -->
      <div id="empty-state" class="col-span-3 hidden flex flex-col items-center justify-center py-16 text-center">
        <div class="mb-4">
          <img src="/assets/img/white-search.png" class="w-16">
        </div>
        <p class="text-[#7a78a0] font-semibold text-[.95rem]">No products found</p>
        <p class="text-[#5a5880] text-[.8rem] mt-1">Try a different keyword or category</p>
      </div>

    </div><!-- end product grid -->

  <script src="/js/products.js">
    
  </script>