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
        <div id="b-rec"
data-open="1"
style="overflow:hidden;transition:max-height .5s ease;max-height:2000px">

    <!-- WRAPPER ATAS -->
    <div class="flex gap-4 px-4 pb-4">

        <!-- kiri -->
        <div class="flex-1">

            <div id="product-grid" class="grid grid-cols-2 gap-3">
<!-- CARD 1 -->
<div data-date="2026-05-11" data-bought="2" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <!-- LEFT -->
  <div class="flex gap-4">

    <!-- IMAGE -->
    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        
        <img
          src="/assets/img/cat_paw_eraser.png"
          class="w-20 h-20 object-contain"
        />

      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        2k people also has this in their favorites
      </p>

    </div>

    <!-- INFO -->
    <div class="flex flex-col justify-between py-1">

      <div>

        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Cat Paw Sharpener
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 11/05/26</p>
          <p>Bought: 2 times</p>
        </div>

      </div>

    </div>

  </div>

  <!-- RIGHT -->
  <div class="flex flex-col justify-between items-center">

    <!-- HEART -->
    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />

    </button>

    <!-- DELETE -->
    <button class="hover:scale-110 transition">

      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />

    </button>

  </div>

</div>

<!-- CARD 2 -->
<div data-date="2026-04-01" data-bought="5" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <div class="flex gap-4">

    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        <img
          src="/assets/img/pen.png"
          class="w-16 h-16 object-contain"
        />
      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        3k people also has this in their favorites
      </p>

    </div>

    <div class="flex flex-col justify-between py-1">

      <div>
        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Pen SmoothWrite 0.5 mm
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 01/04/26</p>
          <p>Bought: 5 times</p>
        </div>
      </div>

    </div>

  </div>

  <div class="flex flex-col justify-between items-center">

    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />
    </button>

    <button class="hover:scale-110 transition">
      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />
    </button>

  </div>

</div>


<!-- CARD 3 -->
<div data-date="2026-03-22" data-bought="1" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <div class="flex gap-4">

    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        <img
          src="/assets/img/cat-paw-stapler.png"
          class="w-24 h-24 object-contain"
        />
      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        1k people also has this in their favorites
      </p>

    </div>

    <div class="flex flex-col justify-between py-1">

      <div>
        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Cat Paw Stapler
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 22/03/26</p>
          <p>Bought: 1 time</p>
        </div>
      </div>

    </div>

  </div>

  <div class="flex flex-col justify-between items-center">

    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />
    </button>

    <button class="hover:scale-110 transition">
      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />
    </button>

  </div>

</div>


<!-- CARD 4 -->
<div data-date="2026-02-14" data-bought="6" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <div class="flex gap-4">

    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        <img
          src="/assets/img/immanuel-big-blue-book.png"
          class="w-20 h-20 object-contain"
        />
      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        110 people also has this in their favorites
      </p>

    </div>

    <div class="flex flex-col justify-between py-1">

      <div>
        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Immanuel Big Blue Book
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 14/02/26</p>
          <p>Bought: 6 times</p>
        </div>
      </div>

    </div>

  </div>

  <div class="flex flex-col justify-between items-center">

    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />
    </button>

    <button class="hover:scale-110 transition">
      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />
    </button>

  </div>

</div>


<!-- CARD 5 -->
<div data-date="2026-01-01" data-bought="7" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <div class="flex gap-4">

    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        <img
          src="/assets/img/immanuel-math-book.png"
          class="w-20 h-20 object-contain"
        />
      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        67 people also has this in their favorites
      </p>

    </div>

    <div class="flex flex-col justify-between py-1">

      <div>
        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Immanuel Math Book
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 01/01/26</p>
          <p>Bought: 7 times</p>
        </div>
      </div>

    </div>

  </div>

  <div class="flex flex-col justify-between items-center">

    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />
    </button>

    <button class="hover:scale-110 transition">
      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />
    </button>

  </div>

</div>


<!-- CARD 6 -->
<div data-date="2026-12-25" data-bought="1" class="product-card bg-[#2d2b3d] rounded-2xl p-4 flex justify-between gap-4 relative
shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition">

  <div class="flex gap-4">

    <div class="flex flex-col justify-between shrink-0">

      <div class="w-[240px] h-[210px] bg-[#f3f3f3] rounded-2xl flex items-center justify-center">
        <img
          src="/assets/img/yarn-ball.png"
          class="w-24 h-24 object-contain"
        />
      </div>

      <p class="text-[#b9b9b9] text-[12px] mt-2 text-left leading-tight">
        520 people also has this in their favorites
      </p>

    </div>

    <div class="flex flex-col justify-between py-1">

      <div>
        <h2 class="text-white text-[20px] font-extrabold leading-tight">
          Premium Crochet Red Yarn
        </h2>

        <div class="mt-2 text-[#d8d8d8] text-[20px] leading-relaxed">
          <p>Added on 25/12/25</p>
          <p>Bought: 1 time</p>
        </div>
      </div>

    </div>

  </div>

  <div class="flex flex-col justify-between items-center">

    <button
      class="w-11 h-11 rounded-full bg-white
      flex items-center justify-center
      shadow-md hover:scale-110 transition">

      <img
        src="/assets/img/filled-heart.png"
        class="w-10 h-10"
      />
    </button>

    <button class="hover:scale-110 transition">
      <img
        src="/assets/img/trash-can.png"
        class="w-7 h-7 opacity-80 hover:opacity-100"
      />
    </button>

  </div>

</div>
              

            </div>

        </div>

        <!-- kanan -->
        <div class="w-[220px] flex-shrink-0">

            <div class="sticky top-4">

                <select
                id="sortSelect"
                onchange="sortProducts()"
                class="w-full px-5 py-5 text-[20px] rounded-xl border border-white 
                bg-[#262536] text-white font-semibold outline-none">

                    <option value="latest">Sort: Latest</option>
                    <option value="oldest">Sort: Oldest</option>
                    <option value="mostBought">Most Bought</option>
                    <option value="leastBought">Least Bought</option>

                </select>

                <button
                onclick="deleteAllCards()"
                class="w-full my-5 px-5 py-5 text-[20px] rounded-xl border border-white 
                bg-[#8A303F]
                text-white font-semibold
                hover:scale-[1.02] hover:bg-[#a13b4d]
                transition duration-300">
                Delete all
                </button>

            </div>

        </div>

    </div>

    <!-- SEE MORE -->
    <div class="flex justify-end px-6 pb-6">
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