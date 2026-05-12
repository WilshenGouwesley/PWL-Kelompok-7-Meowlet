<?php
session_start();

$username = $_SESSION['user']['username'];
?>

<script>
    tailwind.config = {
    theme: {
      extend: {
        fontFamily: { nunito: ['Nunito', 'sans-serif'] },
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

<div class="w-[100%] bg-[#565272] rounded-xl mt-6 p-8 flex items-center gap-5 relative">

  <div
    class="w-[130px] h-[130px] rounded-full p-[4px]
    bg-gradient-to-br from-yellow-200 via-yellow-400 to-yellow-100
    shadow-[0_0_15px_rgba(255,215,0,0.5)]">

    <img
      src="/assets/img/profile.png"
      alt="profile"
      class="w-full h-full rounded-full border-[#565272]"
    />
  </div>

  <div>
    <h1 class="text-white text-[37px] font-reguler">
      <?=$username;?>
    </h1>

    <div class="flex row items-center">
      <div class="mt-3 px-5 py-2 rounded-full
      bg-[#FEDC73]
      text-[#2f243a] font-reguler text-lg
      shadow-[0_0_10px_rgba(255,215,0,0.3)]">
      Gold Member
      </div>

      <h2 class="mt-3 mx-5">Learn more</h2>
    </div>
  </div>

  <button
    class="absolute right-8 px-7 py-3 rounded-2xl border-2 border-white bg-gradient-to-b from-[#302E3E] to-[#5B57A5] text-white text-xl font-semibold
    transition duration-300 hover:scale-105 hover:bg-[#6c66a0]">
    Edit Profile
  </button>

</div>

<div class="bg-[#3a3852] rounded-xl mt-6 overflow-hidden">
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
          <div class="px-4 pb-4 grid grid-cols-2 gap-3">

            <!-- Card 1 -->
            <div class="bg-[#2d2b3d] rounded-xl overflow-hidden">
              <div class="relative rounded-lg m-2 h-[148px] overflow-hidden">
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

            
          <div class="relative bg-[#2d2b3d] rounded-xl p-1">

          <button
          class="absolute right-4 top-4 px-5 py-2 rounded-xl border border-white 
          bg-gradient-to-b from-[#302E3E] to-[#5B57A5] 
          text-white text-base font-semibold">
    
          Edit Profile
          </button>

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

  <script src="/js/main.js">

  </script>