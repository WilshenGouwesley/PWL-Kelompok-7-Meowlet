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
          bg: '#1e1c2e',
          nav: '#14121f',
          card: '#2d2b3d',
          panel: '#3a3852',
          border: '#4a4870',
          violet: '#7b5fff',
          gold: '#f5a800',
        },
      },
    },
  }
</script>

<!-- PROFILE HEADER -->
<div class="w-[100%] bg-[#565272] rounded-xl mt-6 p-8 flex items-center gap-5 relative">
  <div class="w-[130px] h-[130px] rounded-full p-[4px]
    bg-gradient-to-br from-yellow-200 via-yellow-400 to-yellow-100
    shadow-[0_0_15px_rgba(255,215,0,0.5)]">
    <img src="/assets/img/profile.png" alt="profile" class="w-full h-full rounded-full border-[#565272]" />
  </div>
  <div>
    <h1 class="text-white text-[37px] font-reguler"><?= $username; ?></h1>
    <div class="flex row items-center">
      <div
        class="mt-3 px-5 py-2 rounded-full bg-[#FEDC73] text-[#2f243a] font-reguler text-lg shadow-[0_0_10px_rgba(255,215,0,0.3)]">
        Gold Member
      </div>
      <h2 class="mt-3 mx-5">Learn more</h2>
    </div>
  </div>
  <a href="/main/editprofile">
    <button
      class="absolute right-8 px-7 py-3 rounded-2xl border-2 border-white bg-gradient-to-b from-[#302E3E] to-[#5B57A5] text-white text-xl font-semibold transition duration-300 hover:scale-105 hover:bg-[#6c66a0]">
      Edit Profile
    </button>
  </a>
</div>

<!-- FAVOURITE SECTION -->
<div class="bg-[#3a3852] rounded-xl mt-6 overflow-hidden">
  <button onclick="toggle('rec')"
    class="w-full flex items-center justify-between px-4 py-3.5 hover:bg-white/5 transition-colors">
    <span class="flex items-center gap-2 font-bold text-[.93rem] text-[#ddd]">
      Favourite
      <img src="/assets/img/about.png" alt="about" class="w-4 h-4">
    </span>
    <span class="flex items-center gap-2">
      <span class="bg-[#4a4870] text-[#ccc] text-[.72rem] font-bold rounded-full px-3 py-0.5">Order history</span>
      <img src="/assets/img/up.png" id="arrow-rec" class="w-5 h-5 transition-transform duration-300 rotate-180">
    </span>
  </button>

  <div id="b-rec" data-open="1" style="overflow:hidden;transition:max-height .5s ease;max-height:2000px">

    <div class="flex gap-4 px-4 pb-4">

      <!-- GRID KARTU FAVOURITES -->
      <div class="flex-1">
        <div id="fav-grid" class="grid grid-cols-2 gap-3">
        </div>
        <div id="fav-empty" class="hidden py-12 text-center text-[#888] text-sm">
          Belum ada produk favorit.<br>Tekan ♥ di halaman utama untuk menambahkan.
        </div>
      </div>

      <!-- SIDEBAR SORT & DELETE -->
      <div class="w-[220px] flex-shrink-0">
        <div class="sticky top-4">
          <select id="sortSelect" onchange="sortFavourites()"
            class="w-full px-5 py-5 text-[20px] rounded-xl border border-white bg-[#262536] text-white font-semibold outline-none">
            <option value="latest">Sort: Latest</option>
            <option value="oldest">Sort: Oldest</option>
          </select>
          <button onclick="deleteAllFavourites()"
            class="w-full my-5 px-5 py-5 text-[20px] rounded-xl border border-white bg-[#8A303F] text-white font-semibold hover:scale-[1.02] hover:bg-[#a13b4d] transition duration-300">
            Delete all
          </button>
        </div>
      </div>

    </div>

  </div>
</div>

<script src="/js/profile.js"></script>

<script src="/js/main.js"></script>