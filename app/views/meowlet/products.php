<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet – Products</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
  <style>
    @keyframes floatY { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
    .anim-float { animation: floatY 4s ease-in-out infinite; transform-box:fill-box; transform-origin:center; }
  </style>
</head>
<body style="font-family:'Koh Santepheap',sans-serif" class="bg-[#2d2b3d] text-[#b0aec8] min-h-screen">

  <!-- NAVBAR -->
  <nav class="bg-[#1e1c2e] sticky top-0 z-50 w-full flex items-center justify-between px-8 h-[54px] border-b border-white/5">
    <div class="w-32 flex items-center gap-2">
      <a href="/main">
      <img src="/assets/img/logo.png" alt="logo">
      </a>
    </div>

    <ul class="flex gap-8 list-none m-0 p-0 text-[.88rem]">
      <li><a href="/main" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Dashboard</a></li>
      <li><a href="#"     class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Earn</a></li>
      <li><a href="/products"     class="text-white font-bold border-b-2 border-white pb-0.5 no-underline">Products</a></li>
      <li><a href="/cart" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Cart</a></li>
      <li><a href="#"     class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">About</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <span class="font-extrabold text-[.9rem]">2.203</span>
      <img src="/assets/img/point.png" alt="point" class="w-7 h-7">
      <img src="/assets/img/profile.png" alt="avatar" class="w-8 h-8 rounded-full object-cover"/>
    </div>
  </nav>

  <!-- BANNER -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

  <!-- MAIN CONTENT -->
  <div class="w-full px-8 pb-8">

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

    <!-- Slogan -->
    <div class="bg-[#1e1c2e] rounded-2xl p-10 flex items-center justify-between gap-8 mt-10">
      <h2 style="font-family:'Fredoka One',cursive" class="text-[1.8rem] text-white leading-tight">Powered by Skills<br>Not Money</h2>
      <div class="max-w-[360px]">
        <p class="text-[.8rem] font-bold text-[#a78bfa] mb-2">Stuff for Schools and Studies</p>
        <p class="text-[.77rem] text-[#7a78a0] leading-relaxed">Every activity in this marketplace is automatically recorded and can be monitored, so that the process of exchanging goods and services is honest, safe, and responsible.</p>
      </div>
    </div>

  </div><!-- end main content -->

  <!-- Footer -->
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
  </script>
</body>
</html>