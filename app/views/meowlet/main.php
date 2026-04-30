
  <!-- BANNER -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

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

      <!-- RECOMMENDED -->
      <div class="bg-[#3a3852] rounded-xl overflow-hidden">
        <button onclick="toggle('rec')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
          <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
            Recommended
            <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
          </span>
          <span class="flex items-center gap-2">
            <span class="bg-[#4a4870] text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-0.5">Order history</span>
            <img src="/assets/img/up.png" id="arrow-rec" class="w-5 h-5 transition-transform duration-300 rotate-180">
          </span>
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

  <script src="/js/main.js">
    
  </script>