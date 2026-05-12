<?php
session_start();

$username = $_SESSION['user']['username'];
?>

  <script>
    tailwind.config = {
    theme: {
      extend: {
        colors: {
          bg:     '#1e1c2e',
          nav:    '#14121f',
          card:   '#2d2b3d',
          panel:  '#3a3852',
          border: '#4a4870',
          violet: '#7b5fff',
          gold:   '#f5a800',
        },
        keyframes: {
          float: {
            '0%,100%': { transform: 'translateY(0)' },
            '50%':     { transform: 'translateY(-6px)' },
          },
        },
        animation: {
          'float':  'float 3s ease-in-out infinite',
          'float2': 'float 3s ease-in-out 0.4s infinite',
          'float3': 'float 3s ease-in-out 0.8s infinite',
          'float4': 'float 3s ease-in-out 0.2s infinite',
          'float5': 'float 3s ease-in-out 0.6s infinite',
          'float6': 'float 3s ease-in-out 1s infinite',
        },
      },
    },
  }
  </script>
  <!-- BANNER -->
  <div class="relative w-full h-[460px]">
    <img src="/assets/img/banner.png" alt="banner" class="absolute inset-0 w-full h-full object-cover"/>
  </div>

    <!-- PROFILE -->
    <div class="flex items-center gap-4 pt-4 pb-4 mt-8">
      <div class="w-[80px] h-[80px] rounded-full flex-shrink-0 -mt-8 shadow-xl overflow-hidden">
        <img src="/assets/img/profile.png" alt="Profile" class="w-full h-full object-cover"/>
      </div>
      <p class="text-white font-extrabold text-[1.2rem] -mt-4"><?= $username; ?></p>
    </div>

    <!-- ACCORDIONS -->
    <div class="space-y-2.5">

      <!-- YOUR PERKS -->
      <div class="bg-panel rounded-xl overflow-hidden">
      <button onclick="toggleAcc('perks')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
        <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
          Your perks <img src="assets/img/about.png" class="w-4 h-4">
        </span>
        <span class="flex items-center gap-2">
          <span class="bg-border text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-1 inline-flex items-center gap-1.5"><img src="/assets/img/coupon.png" class="w-4 h-4"> Coupon (2)</span>
          <img src="/assets/img/up.png" class="w-5 h-5 transition-transform duration-300 rotate-180" id="arrow-perks">
        </span>
      </button>
      <div id="body-perks" class="overflow-hidden transition-[max-height] duration-[380ms] ease-in-out" style="max-height:2000px">
        <div class="px-4 pb-4 grid grid-cols-2 gap-3">
 
          <!-- Perk 1 -->
          <div class="bg-gradient-to-br from-card to-panel border border-border rounded-2xl p-3">
            <div class="flex items-center justify-between mb-2">
              <span class="bg-green-500 text-white text-[.65rem] font-bold rounded-full px-2 py-0.5">Active now</span>
              <span class="text-red-400 text-[.7rem] font-bold">02:19:53</span>
            </div>
            <div>
              <img src="/assets/img/Perks1.png" class="mb-4">
            </div>
            <p class="text-white font-bold text-[.78rem] leading-snug mb-1">2x Points Boost - Today's Spell</p>
            <p class="text-[#999] text-[.68rem] mb-2">All school transactions earn double points. Valid until midnight.</p>
            <div class="flex gap-1.5 mb-2">
              <span class="bg-border text-[#ccc] text-[.62rem] font-semibold rounded-full px-2 py-0.5">All Categories</span>
              <span class="bg-border text-[#ccc] text-[.62rem] font-semibold rounded-full px-2 py-0.5">Today Only</span>
            </div>
            <button class="w-full bg-violet text-white text-[.78rem] font-bold rounded-xl py-2 hover:bg-[#6b4fef] transition-colors inline-flex items-center justify-center gap-2">
              <img src="/assets/img/paw.png" class="w-4 h-4" alt="paw icon">
              <span>Use Boost</span>
            </button>
          </div>
 
          <!-- Perk 2 -->
          <div class="bg-gradient-to-br from-card to-panel border border-border rounded-2xl p-3">
            <div class="flex items-center justify-between mb-2">
              <span class="bg-blue-500 text-white text-[.65rem] font-bold rounded-full px-2 py-0.5">Flash sale</span>
              <span class="text-red-400 text-[.7rem] font-bold">01:44:29</span>
            </div>
            <div>
              <img src="/assets/img/Perks2.png" class="mb-4">
            </div>
            <p class="text-white font-bold text-[.78rem] leading-snug mb-1">Midnight flash sale – up to 50% off</p>
            <p class="text-[#999] text-[.68rem] mb-2">Lighting deals under the stars. Prices drop fast, limited slots.</p>
            <div class="flex gap-1.5 mb-2">
              <span class="bg-border text-[#ccc] text-[.62rem] font-semibold rounded-full px-2 py-0.5">Limited Stock</span>
              <span class="bg-border text-[#ccc] text-[.62rem] font-semibold rounded-full px-2 py-0.5">Once a day</span>
            </div>
            <button class="w-full bg-border text-white text-[.78rem] font-bold rounded-xl py-2 hover:bg-[#5a5890] transition-colors inline-flex items-center justify-center gap-2">
              <img src="/assets/img/paw.png" class="w-4 h-4" alt="paw icon">
              <span>View all flash deals</span>
            </button>
          </div>
 
        </div>
      </div>
    </div>

      <!-- YOUR PROGRESS -->
      <div class="bg-panel rounded-xl overflow-hidden">
      <button onclick="toggleAcc('prog')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
        <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
          Your progress <span class="text-[#888] text-[.75rem]"><img src="/assets/img/fire.png" class="w-4 h-4"></span>
        </span>
        <img src="/assets/img/up.png" class="w-5 h-5 transition-transform duration-300 rotate-180" id="arrow-perks">
      </button>
      <div id="body-prog" class="overflow-hidden transition-[max-height] duration-[380ms] ease-in-out" style="max-height:2000px">
        <div class="px-4 pb-2 grid grid-cols-3 gap-3">
 
          <!-- Daily Streak -->
          <div class="bg-card rounded-xl p-3">
            <p class="text-[#aaa] text-[.7rem] font-semibold mb-2">Daily streak</p>
            <div class="flex items-center gap-2">
              <span class="text-2xl"><img src="/assets/img/fire.png" class="w-8 h-8"></span>
              <span class="text-white font-extrabold text-[1.4rem]">5 days</span>
            </div>
          </div>
 
          <!-- Streak Bonus -->
          <div class="bg-card rounded-xl p-3">
            <p class="text-[#aaa] text-[.7rem] font-semibold mb-2">Streak bonus</p>
            <div class="grid grid-cols-5 gap-1 mb-1">
              <div class="w-6 h-6 rounded-full bg-border border-2 border-violet flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak on.png"></div>
              <div class="w-6 h-6 rounded-full bg-border border-2 border-violet flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak on.png"></div>
              <div class="w-6 h-6 rounded-full bg-border border-2 border-violet flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak on.png"></div>
              <div class="w-6 h-6 rounded-full bg-border border-2 border-violet flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak on.png"></div>
              <div class="w-6 h-6 rounded-full bg-border border-2 border-violet flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak on.png"></div>
            </div>
            <div class="grid grid-cols-5 gap-1">
              <div class="w-6 h-6 rounded-full bg-card border-2 border-border flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak off.png"></div>
              <div class="w-6 h-6 rounded-full bg-card border-2 border-border flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak off.png"></div>
              <div class="w-6 h-6 rounded-full bg-card border-2 border-border flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak off.png"></div>
              <div class="w-6 h-6 rounded-full bg-card border-2 border-border flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak off.png"></div>
              <div class="w-6 h-6 rounded-full bg-card border-2 border-border flex items-center justify-center text-[.6rem]"><img src="/assets/img/Streak off.png"></div>
            </div>
          </div>
 
          <!-- Rewards Goal -->
          <div class="bg-card rounded-xl p-3">
            <p class="text-[#aaa] text-[.7rem] font-semibold mb-1">Set a rewards goal</p>
            <p class="text-[#ccc] text-[.68rem] mb-2">Choose a gift card or donation as your goal</p>
            <div class="flex items-center justify-between">
              <span class="text-violet text-[.68rem] font-bold cursor-pointer hover:underline">Browse rewards →</span>
              <span class="text-2xl"><img src="/assets/img/gift.png" class="w-8 h-8"></span>
            </div>
          </div>
 
        </div>
        <!-- Progress bar -->
        <div class="px-4 pb-4 pt-2">
          <div class="bg-card rounded-full h-3 overflow-hidden">
            <div id="prog-bar" class="h-full rounded-full [background:linear-gradient(90deg,#7b5fff,#a78bfa)] transition-[width] duration-1000 delay-500" style="width:0"></div>
          </div>
          <div class="flex justify-between mt-1">
            <span class="text-[#888] text-[.68rem]">0</span>
            <span class="text-[#a78bfa] text-[.68rem] font-bold">42% to Gold II</span>
            <span class="text-[#888] text-[.68rem]">100</span>
          </div>
        </div>
      </div>
    </div>

      <!-- DAILY SET -->
      <div class="bg-panel rounded-xl overflow-hidden">
      <button onclick="toggleAcc('daily')" class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
        <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
          Daily set <span class="text-[#888] text-[.75rem]"><img src="/assets/img/about.png" class="w-4 h-4"></span>
        </span>
        <span class="flex items-center gap-2">
          <span class="bg-border text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-0.5">See more tasks</span>
          <img src="/assets/img/up.png" class="w-5 h-5 transition-transform duration-300 rotate-180" id="arrow-perks">
        </span>
      </button>
      <div id="body-daily" class="overflow-hidden transition-[max-height] duration-[380ms] ease-in-out" style="max-height:2000px">
        <div class="px-4 pb-4 grid grid-cols-3 gap-3">
 
          <!-- Task 1 -->
          <div onclick="toggleTask(this)"
               class="bg-card border border-border rounded-2xl p-3 flex flex-col justify-between min-h-[110px] cursor-pointer hover:border-violet transition-colors duration-200 group">
            <div class="flex items-start gap-2.5">
              <div class="w-11 h-11 rounded-xl bg-border flex items-center justify-center shrink-0 text-2xl"><img src="/assets/img/The amazing hyena.png" class="w-8 h-8"></div>
              <div class="flex-1 min-w-0">
                <p class="text-white font-bold text-[.78rem] leading-snug mb-0.5">The Amazing Hyena</p>
                <p class="text-[#999] text-[.66rem] leading-snug line-clamp-3">An awesome mammal that will always amaze everyone with their features.</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-2.5">
              <span class="text-gold font-bold text-[.75rem]">+10</span>
            </div>
          </div>
 
          <!-- Task 2 -->
          <div onclick="toggleTask(this)"
               class="bg-card border border-border rounded-2xl p-3 flex flex-col justify-between min-h-[110px] cursor-pointer hover:border-violet transition-colors duration-200 group">
            <div class="flex items-start gap-2.5">
              <div class="w-11 h-11 rounded-xl bg-[#1a3a5e] flex items-center justify-center shrink-0 text-2xl"><img src="/assets/img/World travel.png" class="w-8 h-8"></div>
              <div class="flex-1 min-w-0">
                <p class="text-white font-bold text-[.78rem] leading-snug mb-0.5">World Travel</p>
                <p class="text-[#999] text-[.66rem] leading-snug line-clamp-3">Learn about the best rated countries to travel to in Worldreview.</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-2.5">
              <span class="text-gold font-bold text-[.75rem]">+10</span>
            </div>
          </div>
 
          <!-- Task 3 -->
          <div onclick="toggleTask(this)"
               class="bg-card border border-border rounded-2xl p-3 flex flex-col justify-between min-h-[110px] cursor-pointer hover:border-violet transition-colors duration-200 group">
            <div class="flex items-start gap-2.5">
              <div class="w-11 h-11 rounded-xl bg-[#3a2a1a] flex items-center justify-center shrink-0 text-2xl"><img src="/assets/img/Grandmas Recipe.png" class="w-8 h-8"></div>
              <div class="flex-1 min-w-0">
                <p class="text-white font-bold text-[.78rem] leading-snug mb-0.5">Grandma's Recipe</p>
                <p class="text-[#999] text-[.66rem] leading-snug line-clamp-3">Get recommendation on what to cook today. From meals, snacks, even beverages.</p>
              </div>
            </div>
            <div class="flex items-center justify-between mt-2.5">
              <span class="text-gold font-bold text-[.75rem]">+10</span>
            </div>
          </div>
 
        </div>
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
                </div>
              </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-[#2d2b3d] rounded-2xl overflow-hidden">
              <div class="relative rounded-xl m-2 h-[148px] overflow-hidden">
                <div class="w-full h-full bg-white rounded-xl flex flex-col items-center justify-center gap-1">
                  <img src="/assets/img/pen.png" class="w-20 h-20 object-contain anim-float"/>
                </div>
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