<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet – Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
  <style>
    @keyframes floatY { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
    @keyframes prog   { from{width:0} to{width:42%} }
    .anim-float { animation: floatY 4s ease-in-out infinite; transform-box:fill-box; transform-origin:center; }
    #prog-bar   { animation: prog 1s ease-out 0.5s both; }
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
      <li><a href="#"         class="text-white font-bold border-b-2 border-white pb-0.5 no-underline">Dashboard</a></li>
      <li><a href="#"         class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Earn</a></li>
      <li><a href="/products" class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Products</a></li>
      <li><a href="/cart"     class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">Cart</a></li>
      <li><a href="#"         class="text-[#7a78a0] font-semibold no-underline hover:text-white transition-colors">About</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <div class="flex items-center gap-1.5 px-3.5 py-1 font-extrabold text-[.9rem]">
        2.203
      </div>
      <img src="/assets/img/point.png" alt="point" class="w-7 h-7">
      <img src="/assets/img/profile.png" alt="avatar" class="w-8 h-8 rounded-full object-cover"/>
    </div>
  </nav>

  <!-- BANNER -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

  <!-- MAIN LAYOUT -->
  <div class="w-full px-8 pb-8">

    <!-- PROFILE -->
    <div class="flex items-center gap-4 pt-4 pb-4 mt-8">
      <div class="w-[80px] h-[80px] rounded-full flex-shrink-0 -mt-8 shadow-xl overflow-hidden">
        <img src="/assets/img/profile.png" alt="Profile" class="w-full h-full object-cover"/>
      </div>
      <p class="text-white font-extrabold text-[1.2rem] -mt-4">Saquwile</p>
    </div>

    <!-- ACCORDIONS -->
    <div class="space-y-2.5">

      <!-- YOUR PERKS -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('perks')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Your perks
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <span class="flex items-center gap-2">
            <span class="bg-[#4a4870] text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-1 inline-flex items-center gap-2">
              <img src="/assets/img/coupon.png" alt="coupon" class="w-4 h-4">
              Coupon (0)
            </span>
            <img src="/assets/img/up.png" id="arrow-perks" class="w-5 h-5 transition-transform duration-300 rotate-180">
          </span>
        </button>
        <div id="b-perks" data-open="1" style="overflow:hidden;transition:max-height .35s ease;max-height:300px">
        </div>
      </div>

      <!-- YOUR PROGRESS -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('prog')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Your progress
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <img src="/assets/img/up.png" id="arrow-prog" class="w-5 h-5 transition-transform duration-300 rotate-180">
        </button>
        <div id="b-prog" data-open="1" style="overflow:hidden;transition:max-height .35s ease;max-height:400px">
        </div>
      </div>

      <!-- DAILY SET -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('daily')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Daily set
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <span class="flex items-center gap-2">
            <span class="bg-[#4a4870] text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-0.5">See more tasks</span>
            <img src="/assets/img/up.png" id="arrow-daily" class="w-5 h-5 transition-transform duration-300 rotate-180">
          </span>
        </button>
        <div id="b-daily" data-open="1" style="overflow:hidden;transition:max-height .35s ease;max-height:400px">
        </div>
      </div>

      <!-- FEATURED REDEMPTIONS -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('redeem')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Featured redemptions
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <span class="flex items-center gap-2">
            <span class="bg-[#4a4870] text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-0.5">Order history</span>
            <img src="/assets/img/up.png" id="arrow-redeem" class="w-5 h-5 transition-transform duration-300 rotate-180">
          </span>
        </button>
        <div id="b-redeem" data-open="1" style="overflow:hidden;transition:max-height .35s ease;max-height:300px">
        </div>
      </div>

      <!-- RECOMMENDED -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('rec')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Recommended
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <img src="/assets/img/up.png" id="arrow-rec" class="w-5 h-5 transition-transform duration-300 rotate-180">
        </button>
        <div id="b-rec" data-open="1" style="overflow:hidden;transition:max-height .5s ease;max-height:2000px">
          <div class="px-4 pb-4 grid grid-cols-3 gap-3">

            <!-- Card 1 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/cat_paw_eraser.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Cat Paw Sharpener</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Sharpener</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">450</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <a href="/detail">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/pen.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                </a>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Pen SmoothWrite 0.5 mm</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Pen</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">150</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/cat-paw-stapler.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Cat Paw Stapler</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stapler</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">700</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/immanuel-big-blue-book.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Immanuel Big Blue Book</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Book</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">400</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

            <!-- Card 5 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/immanuel-math-book.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Immanuel Math Book</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Book</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">400</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

            <!-- Card 6 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/yarn-ball.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
                <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-9 h-9 rounded-full bg-white shadow-md flex items-center justify-center hover:scale-110 transition-transform z-10">
                  <img src="/assets/img/unfilled-heart.png" data-state="empty">
                </button>
              </div>
              <div class="px-3 pb-3 pt-1">
                <p class="text-white font-extrabold text-[.95rem] leading-snug mb-2">Premium Crochet Red Yarn</p>
                <div class="flex flex-wrap gap-1.5 mb-2.5">
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Stationary</span>
                  <span class="bg-[#4a4870] text-[#ccc] text-[.67rem] font-semibold rounded-full px-2.5 py-0.5">Hobbies</span>
                </div>
                <div class="flex items-center gap-1.5 mb-3">
                  <img src="/assets/img/point.png" class="w-5 h-5">
                  <span class="text-[#f5a800] font-extrabold text-[1.05rem]">680</span>
                </div>
                <div class="flex gap-2">
                  <button onclick="toggleAdded(this)" class="flex-1 bg-[#4a4870] text-white font-bold text-[.76rem] rounded-xl py-2 hover:bg-[#5a5890] transition-colors">Add to cart</button>
                  <button class="flex-1 bg-gradient-to-br from-[#4a4870] to-[#6b5fff] text-white font-bold text-[.76rem] rounded-xl py-2 hover:opacity-90 transition-opacity">Order Now</button>
                </div>
              </div>
            </div>

          </div>

          <div class="flex justify-end p-6">
            <a href="/products">
              <button class="flex items-center gap-1 text-[#aaa] hover:text-white transition-colors">
                See more
                <img src="/assets/img/right.png" class="w-5 h-5">
              </button>
            </a>
          </div>

        </div>
      </div>

    </div><!-- end accordions -->

    <!-- Slogan -->
    <div class="bg-[#1e1c2e] rounded-2xl p-10 flex items-center justify-between gap-8 mt-10">
      <h2 style="font-family:'Fredoka One',cursive" class="text-[1.8rem] text-white leading-tight">Powered by Skills<br>Not Money</h2>
      <div class="max-w-[360px]">
        <p class="text-[.8rem] font-bold text-[#a78bfa] mb-2">Stuff for Schools and Studies</p>
        <p class="text-[.77rem] text-[#7a78a0] leading-relaxed">Every activity in this marketplace is automatically recorded and can be monitored, so that the process of exchanging goods and services is honest, safe, and responsible.</p>
      </div>
    </div>

  </div><!-- end main layout -->

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
    function toggle(id) {
      const arrow = document.getElementById("arrow-" + id);
      const box = document.getElementById("b-" + id);
      const isOpen = box.getAttribute("data-open") === "1";
      box.style.maxHeight = isOpen ? "0px" : box.scrollHeight + "px";
      box.setAttribute("data-open", isOpen ? "0" : "1");
      arrow.classList.toggle("rotate-180", !isOpen);
    }

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
      btn.textContent = added ? 'Add to cart' : '+ Added';
      btn.style.background = added ? '' : '#5a5890';
    }

    function toggleTask(el) {
      const done = el.dataset.done === '1';
      el.dataset.done = done ? '' : '1';
      el.style.background = done ? '' : '#7b5fff';
      el.style.borderColor = done ? '#4a4870' : '#7b5fff';
      el.textContent = done ? '' : '✓';
    }

    window.addEventListener('load', () => {
      setTimeout(() => {
        document.getElementById('prog-bar').style.width = '42%';
      }, 500);
    });
  </script>
</body>
</html>