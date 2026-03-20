<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/output.css">
</head>
<body class="font-koh bg-gradient-to-b from-[#2C2B34] to-[#4B4960] text-[#b0aec8] min-h-screen">
<!-- NAVBAR -->

    <nav class="bg-[#4B4960] sticky top-0 z-50 w-full flex items-center justify-between px-8 h-[54px] border-b border-white/5">
    <div style="font-family:'Fredoka One',cursive" class="w-32 flex items-center gap-2">
      <img src="/assets/img/logo.png" alt="logo">
    </div>

    <ul class="flex gap-8 list-none m-0 p-0 text-[.88rem]">
      <li><a href="#" class="text-[#D9D9D9] text-[20px] no-underline hover:text-white transition-colors">Dashboard</a></li>
      <li><a href="#" class="text-[#D9D9D9] text-[20px] no-underline hover:text-white transition-colors">Earn</a></li>
      <li><a href="#" class="text-[#D9D9D9] text-[20px] no-underline hover:text-white transition-colors">Products</a></li>
      <li><a href="#" class="text-white text-[20px] font-bold border-b-2 border-[#FDDC73] pb-0.5 no-underline">Cart</a></li>
      <li><a href="#" class="text-[#D9D9D9] text-[20px] no-underline hover:text-white transition-colors">About</a></li>
    </ul>

    <div class="flex items-center gap-3">
      <div class="flex items-center gap-1.5 px-3.5 py-1 text-[#FFE194] font-extrabold text-[16px]">
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
<!-- BODY -->
<div class="ps-[60px] pt-[60px] pe-[60px]">
    <section>
        <h1 class="text-[60px] font-bold">
            < Cart
        </h1>
        <p class="text-[20px]">
            Explore a complete record of your purchases, review detailed information for each <br> transaction, and stay updated on shipping progress.
        </p>
    </section>
    <section class="pt-[40px]">
        <h1 class="text-[28px]">
            Your orders
        </h1>
        <div id="cart" class="space-y-4">

  <!-- ITEM -->
  <div class="item flex items-center justify-between bg-[#4a495b] rounded-xl p-4 text-white">
    
    <div class="flex items-center gap-4">
      <img src="https://via.placeholder.com/60" class="rounded-lg">
      
      <div>
        <h2 class="font-semibold text-[20px]">Pen SmoothWrite 0.5mm</h2>
        <p class="text-[#FFE194] text-[21px]">150</p>
        <p class="text-[12px] text-gray-300">Order no. 220309</p>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <!-- COUNTER -->
      <div class="flex items-center bg-gray-200 text-black rounded-lg overflow-hidden">
        <button class="px-3 minus">-</button>
        <span class="px-3 qty">1</span>
        <button class="px-3 plus">+</button>
      </div>

      <!-- DELETE -->
      <button class="delete text-white text-xl">🗑️</button>
    </div>
  </div>

  <!-- COPY 3x -->
  <div class="item flex items-center justify-between bg-[#4a495b] rounded-xl p-4 text-white">
    <div class="flex items-center gap-4">
      <img src="https://via.placeholder.com/60" class="rounded-lg">
      <div>
        <h2 class="font-semibold text-[20px]">Premium Cat Stapler</h2>
        <p class="text-[#FFE194] text-[21px]">610</p>
        <p class="text-[12px] text-gray-300">Order no. 281928</p>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <div class="flex items-center bg-gray-200 text-black rounded-lg overflow-hidden">
        <button class="px-3 minus">-</button>
        <span class="px-3 qty">1</span>
        <button class="px-3 plus">+</button>
      </div>
      <button class="delete text-xl">🗑️</button>
    </div>
  </div>

  <div class="item flex items-center justify-between bg-[#4a495b] rounded-xl p-4 text-white">
    <div class="flex items-center gap-4">
      <img src="https://via.placeholder.com/60" class="rounded-lg">
      <div>
        <h2 class="font-semibold text-[20px]">Cat Paw Sharpener</h2>
        <p class="text-[#FFE194] text-[21px]">300</p>
        <p class="text-[12px] text-gray-300">Order no. 062793</p>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <div class="flex items-center bg-gray-200 text-black rounded-lg overflow-hidden">
        <button class="px-3 minus">-</button>
        <span class="px-3 qty">1</span>
        <button class="px-3 plus">+</button>
      </div>
      <button class="delete text-xl">🗑️</button>
    </div>
  </div>

  <div class="item flex items-center justify-between bg-[#4a495b] rounded-xl p-4 text-white">
    <div class="flex items-center gap-4">
      <img src="https://via.placeholder.com/60" class="rounded-lg">
      <div>
        <h2 class="font-semibold text-[20px]">Immanuel Big Blue Book</h2>
        <p class="text-[#FFE194] text-[21px]">410</p>
        <p class="text-[12px] text-gray-300">Order no. 581022</p>
      </div>
    </div>

    <div class="flex items-center gap-4">
      <div class="flex items-center bg-gray-200 text-black rounded-lg overflow-hidden">
        <button class="px-3 minus">-</button>
        <span class="px-3 qty">1</span>
        <button class="px-3 plus">+</button>
      </div>
      <button class="delete text-xl">🗑️</button>
    </div>
  </div>

</div>
    </section>
    <section class="flex justify-between pt-[40px]">
        <div class="flex items-center text-white gap-4">
            <h1 class="text-[26px]">
                SubTotal|
            </h1>
            <p class="text-[#FFE194] text-[36px]">410</p>
        </div>
        <div>
            <button onclick="" class="text-[#ffffff] font-bold border rounded-lg text-[20px] ps-[15px] pe-[15px] pt-[10px] pb-[10px] bg-gradient-to-b from-[#302E3E] to-[#5B57A5] hover:cursor-pointer transition-transform duration-500 ease-out hover:scale-110">
                Order Now
            </button>
            <button onclick="" class="text-[#ffffff] border rounded-lg text-[20px] ps-[40px] pe-[40px] pt-[10px] pb-[10px] ms-[20px] hover:cursor-pointer transition-transform duration-500 ease-out hover:scale-110">
                Back
            </button>
        </div>
    </section>
</div>
<footer class="pt-[40px] ps-[60px] pe-[60px] pb-[10px]">
    <div class="flex gap-16 mb-8">
      <div>
        <h4 class="text-[26px] font-extrabold text-white mb-3">About</h4>
        <a href="#" class="block text-[#D9D9D9] text-[21px] mb-2 no-underline hover:text-white transition-colors">Blog</a>
        <a href="#" class="block text-[#D9D9D9] text-[21px] mb-2 no-underline hover:text-white transition-colors">Meet The Team</a>
        <a href="#" class="block text-[#D9D9D9] text-[21px] no-underline hover:text-white transition-colors">Contact Us</a>
      </div>
      <div>
        <h4 class="text-[26px] font-extrabold text-white mb-3">Support</h4>
        <a href="#" class="block text-[#D9D9D9] text-[21px] mb-2 no-underline hover:text-white transition-colors">Contact Us</a>
        <a href="#" class="block text-[#D9D9D9] text-[21px] mb-2 no-underline hover:text-white transition-colors">Return</a>
        <a href="#" class="block text-[#D9D9D9] text-[21px] mb-2 no-underline hover:text-white transition-colors">FAQ</a>
        <a href="#" class="block text-[#D9D9D9] text-[21px] no-underline hover:text-white transition-colors">Help</a>
      </div>
      <div class="ml-auto text-right">
        <h4 class="text-[26px] font-extrabold text-white mb-3">Social Media</h4>
        <div class="flex gap-2 justify-end">
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] text-[#7a78a0] flex items-center justify-center hover:bg-[#4a4870] hover:text-white transition-all">
            <img src="/assets/img/twitter.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] text-[#7a78a0] flex items-center justify-center hover:bg-[#4a4870] hover:text-white transition-all">
          <img src="/assets/img/facebook.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] text-[#7a78a0] flex items-center justify-center hover:bg-[#4a4870] hover:text-white transition-all">
          <img src="/assets/img/instagram.png" class="w-5 h-5">
          </button>
          <button class="w-9 h-9 rounded-lg bg-[#3a3852] text-[#7a78a0] flex items-center justify-center hover:bg-[#4a4870] hover:text-white transition-all">
          <img src="/assets/img/linkedin.png" class="w-5 h-5">
          </button>
        </div>
      </div>
    </div>
    <div class="flex justify-between items-center border-t border-[#ffffff] pt-4 text-[.72rem] text-[#BEBEBE]">
      <span>Copyright 2026... All Right Reserved.</span>
      <a href="#" class="text-[#FFFFFF] no-underline hover:text-white transition-colors">Privacy Policy</a>
    </div>
  </footer>
</body>
</html>