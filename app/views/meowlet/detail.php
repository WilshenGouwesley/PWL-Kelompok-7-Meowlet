<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Meowlet – Product Detail</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap" rel="stylesheet"/>
  <style>
    @keyframes floatY { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-9px)} }
    .anim-float { animation: floatY 4s ease-in-out infinite; }
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
      <li><a href="/main"     class="text-white font-bold border-b-2 border-white pb-0.5 no-underline">Dashboard</a></li>
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

  <!-- MAIN CONTENT -->
  <div class="w-full px-8 pt-8 pb-8">

    <!-- PRODUCT DETAIL SECTION -->
    <div class="flex gap-8 mb-8">

      <!-- LEFT: Gambar produk -->
      <div class="flex flex-col gap-3 flex-shrink-0">
        <!-- Gambar utama -->
        <div class="w-[220px] h-[220px] bg-white rounded-2xl overflow-hidden flex items-center justify-center">
          <img id="main-img" src="/assets/img/pen.png" alt="product" class="w-full h-full object-contain p-4"/>
        </div>
        <!-- Thumbnail -->
        <div class="flex gap-2">
          <button onclick="changeImg(this, '/assets/img/pen.png')" class="thumb-btn w-[64px] h-[64px] bg-white rounded-xl overflow-hidden border-2 border-[#6b5fff] flex items-center justify-center">
            <img src="/assets/img/pen.png" class="w-full h-full object-contain p-1"/>
          </button>
          <button onclick="changeImg(this, '/assets/img/pen2.png')" class="thumb-btn w-[64px] h-[64px] bg-white rounded-xl overflow-hidden border-2 border-transparent flex items-center justify-center hover:border-[#a78bfa] transition-colors">
            <img src="/assets/img/pen2.png" class="w-full h-full object-contain p-1"/>
          </button>
          <button onclick="changeImg(this, '/assets/img/pen3.png')" class="thumb-btn w-[64px] h-[64px] bg-white rounded-xl overflow-hidden border-2 border-transparent flex items-center justify-center hover:border-[#a78bfa] transition-colors">
            <img src="/assets/img/pen3.png" class="w-full h-full object-contain p-1"/>
          </button>
        </div>
      </div>

      <!-- MIDDLE: Info produk -->
      <div class="flex-1">
        <h1 class="text-white font-extrabold text-[1.8rem] leading-tight mb-1">Pen SmoothWrite 0.5 mm</h1>
        <p class="text-[#a78bfa] font-semibold text-[.88rem] mb-3">Stationary</p>
        <p class="text-[#7a78a0] text-[.85rem] leading-relaxed mb-5">
          Pen with gel ink that flows softly so it's comfortable to use when you're writing for a long time.
        </p>

        <p class="text-[#b0aec8] text-[.82rem] mb-1">Total price:</p>
        <div class="flex items-center gap-2 mb-5">
          <span class="text-white font-extrabold text-[2rem]">150</span>
          <img src="/assets/img/point.png" class="w-8 h-8">
        </div>

        <div class="flex items-center gap-3">
          <button class="flex items-center gap-2 bg-white hover:opacity-90 text-black font-bold text-[.88rem] px-6 py-2.5 rounded-xl">
            <img src="/assets/img/black-paw.png" class="w-4">Order Now
          </button>
          <button onclick="toggleWishlist(this)" class="w-10 h-10 rounded-full bg-[#3a3852] border-2 border-[#4a4870] flex items-center justify-center hover:border-[#a78bfa] transition-colors">
            <img id="heart-icon" src="/assets/img/unfilled-heart.png" class="w-5 h-5" data-state="empty">
          </button>
        </div>
      </div>

      <!-- RIGHT: Info box -->
      <div class="w-[220px] flex-shrink-0 bg-[#3a3852] rounded-2xl p-4">
        <p class="text-[#7a78a0] text-[.75rem] font-semibold mb-3">Information</p>
        <!-- Rating -->
        <div class="flex items-center gap-2 mb-3">
          <span class="text-white font-extrabold text-[1.6rem]">4.9</span>
          <div>
          <div class="flex items-center gap-0.5">
            <img src="/assets/img/star.png" class="w-4 h-4">
            <img src="/assets/img/star.png" class="w-4 h-4">
            <img src="/assets/img/star.png" class="w-4 h-4">
            <img src="/assets/img/star.png" class="w-4 h-4">
            <img src="/assets/img/star.png" class="w-4 h-4">
          </div>
            <span class="text-[#7a78a0] text-[.7rem]">(54)</span>
          </div>
        </div>
        <hr class="border-[#4a4870] mb-3"/>
        <!-- Seller info -->
        <div class="flex items-center justify-between">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-[#4a4870] overflow-hidden flex-shrink-0">
              <img src="/assets/img/profile.png" class="w-full h-full object-cover"/>
            </div>
            <span class="text-white text-[.78rem] font-semibold">Hasan Rizki</span>
          </div>
          <div class="flex gap-1.5">
            <button class="w-7 h-7 rounded-full bg-[#E1DFF6] flex items-center justify-center hover:bg-[#6b5fff] transition-colors">
              <img src="/assets/img/message.png" class="w-4 h-4"/>
            </button>
            <button class="w-7 h-7 rounded-full bg-[#E1DFF6] flex items-center justify-center hover:bg-[#6b5fff] transition-colors">
              <img src="/assets/img/telephone.png" class="w-4 h-4"/>
            </button>
          </div>
        </div>
      </div>

    </div>

    <!-- TABS: Description / Reviews -->
    <div class="border-b border-[#3a3852] mb-6">
      <div class="flex gap-8">
        <button onclick="switchTab('desc')" id="tab-desc" class="pb-3 text-[.9rem] font-bold text-[#a78bfa] border-b-2 border-[#a78bfa] transition-colors">Description</button>
        <button onclick="switchTab('rev')" id="tab-rev" class="pb-3 text-[.9rem] font-semibold text-[#7a78a0] border-b-2 border-transparent hover:text-white transition-colors">Reviews</button>
      </div>
    </div>

    <!-- TAB: Description -->
    <div id="panel-desc">
      <p class="text-[#b0aec8] text-[.85rem] leading-relaxed mb-4">
        The SmoothWrite 0.5 mm pen is designed for a smooth and comfortable writing experience. Using high-quality, steady-flowing gel ink, this pen produces neat, clear writing that doesn't break easily.
      </p>
      <p class="text-[#b0aec8] text-[.85rem] leading-relaxed mb-4">
        The 0.5 mm tip makes it ideal for taking notes, writing documents, or taking precise notes. Its lightweight, ergonomic body design makes it comfortable to hold for extended periods. It's suitable for students, schoolchildren, and office workers who need a reliable writing tool every day.
      </p>
      <p class="text-[#7a78a0] text-[.82rem] font-semibold mb-2">Specification:</p>
      <ul class="text-[#b0aec8] text-[.82rem] space-y-1 list-disc list-inside">
        <li>Ink Type: Gel</li>
        <li>Nip Size: 0.5 mm</li>
        <li>Ink Color: Black</li>
        <li>Body Material: Light Plastic</li>
      </ul>
    </div>

    <!-- TAB: Reviews -->
    <div id="panel-rev" class="hidden space-y-6">

      <h2 class="text-white font-extrabold text-[1.1rem]">Review List</h2>

      <!-- Review 1 -->
      <div>
        <div class="flex items-center gap-3 mb-2">
          <div class="w-9 h-9 rounded-full bg-[#4a4870] overflow-hidden flex-shrink-0">
            <img src="/assets/img/profile.png" class="w-full h-full object-cover"/>
          </div>
          <span class="text-white font-bold text-[.9rem]">Christi Hailey</span>
        </div>
        <p class="text-[#b0aec8] text-[.83rem] leading-relaxed mb-1">
          Pulpen SmoothWrite 0.5 mm enak banget dipakai nulis karena tintanya ngalir halus dan nggak seret. Ukuran ujungnya juga pas jadi tulisannya rapi. Cocok dipakai buat catatan sekolah atau nulis sehari-hari.
        </p>
        <div class="flex items-center gap-1.5">
          <span class="text-yellow-400 text-sm">★★★★★</span>
          <span class="text-[#7a78a0] text-[.75rem]">5.0</span>
        </div>
      </div>

      <hr class="border-[#3a3852]"/>

      <!-- Review 2 -->
      <div>
        <div class="flex items-center gap-3 mb-2">
          <div class="w-9 h-9 rounded-full bg-[#4a4870] overflow-hidden flex-shrink-0">
            <img src="/assets/img/profile.png" class="w-full h-full object-cover"/>
          </div>
          <span class="text-white font-bold text-[.9rem]">Gerald Ryan</span>
        </div>
        <p class="text-[#b0aec8] text-[.83rem] leading-relaxed mb-1">
          Pulpen SmoothWrite 0.5 mm enak dipakai buat nulis karena tintanya lancar dan nggak putus-putus. Tulisan jadi kelihatan rapi, apalagi buat catatan di buku. Dipakai lama juga masih nyaman di tangan.
        </p>
        <div class="flex items-center gap-1.5">
          <span class="text-yellow-400 text-sm">★★★★★</span>
          <span class="text-[#7a78a0] text-[.75rem]">5.0</span>
        </div>
      </div>

      <hr class="border-[#3a3852]"/>

      <!-- Review 3 -->
      <div>
        <div class="flex items-center gap-3 mb-2">
          <div class="w-9 h-9 rounded-full bg-[#4a4870] overflow-hidden flex-shrink-0">
            <img src="/assets/img/profile.png" class="w-full h-full object-cover"/>
          </div>
          <span class="text-white font-bold text-[.9rem]">Charlie Wood</span>
        </div>
        <p class="text-[#b0aec8] text-[.83rem] leading-relaxed mb-1">
          Pulpen SmoothWrite 0.5 mm enak dipakai buat nulis karena tintanya lancar dan nggak putus-putus. Tulisan jadi kelihatan rapi, apalagi buat catatan di buku. Dipakai lama juga masih nyaman di tangan.
        </p>
        <div class="flex items-center gap-1.5">
          <span class="text-yellow-400 text-sm">★★★</span>
          <span class="text-[#7a78a0] text-[.75rem]">3.0</span>
        </div>
      </div>

    </div>

    <!-- DIVIDER -->
    <hr class="border-[#3a3852] mt-10 mb-8"/>

    <!-- ANOTHER PRODUCTS -->
    <h2 class="text-white font-extrabold text-[1.1rem] text-center mb-6">Another Products</h2>
    <div class="grid grid-cols-4 gap-4 mb-8">

      <!-- Product card kecil -->
      <div class="bg-[#3a3852] rounded-2xl overflow-hidden cursor-pointer hover:-translate-y-1 transition-transform">
        <div class="relative bg-white rounded-xl m-2 h-[130px] overflow-hidden flex items-center justify-center">
          <img src="/assets/img/immanuel-big-blue-book.png" class="w-full h-full object-contain p-2"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty" class="w-4 h-4">
          </button>
        </div>
        <div class="px-3 pb-3 pt-1">
          <p class="text-[#7a78a0] text-[.65rem] mb-0.5">Book</p>
          <p class="text-white font-bold text-[.82rem] leading-snug mb-1.5">Campus Note Books (5pc)</p>
          <div class="flex items-center gap-1">
            <img src="/assets/img/point.png" class="w-4 h-4">
            <span class="text-[#f5a800] font-extrabold text-[.85rem]">500</span>
          </div>
        </div>
      </div>

      <div class="bg-[#3a3852] rounded-2xl overflow-hidden cursor-pointer hover:-translate-y-1 transition-transform">
        <div class="relative bg-white rounded-xl m-2 h-[130px] overflow-hidden flex items-center justify-center">
          <img src="/assets/img/wool-brush.png" class="w-full h-full object-contain p-2"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty" class="w-4 h-4">
          </button>
        </div>
        <div class="px-3 pb-3 pt-1">
          <p class="text-[#7a78a0] text-[.65rem] mb-0.5">Hobbies</p>
          <p class="text-white font-bold text-[.82rem] leading-snug mb-1.5">Wool Brush</p>
          <div class="flex items-center gap-1">
            <img src="/assets/img/point.png" class="w-4 h-4">
            <span class="text-[#f5a800] font-extrabold text-[.85rem]">300</span>
          </div>
        </div>
      </div>

      <div class="bg-[#3a3852] rounded-2xl overflow-hidden cursor-pointer hover:-translate-y-1 transition-transform">
        <div class="relative bg-white rounded-xl m-2 h-[130px] overflow-hidden flex items-center justify-center">
          <img src="/assets/img/clearline-ruler.png" class="w-full h-full object-contain p-2"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty" class="w-4 h-4">
          </button>
        </div>
        <div class="px-3 pb-3 pt-1">
          <p class="text-[#7a78a0] text-[.65rem] mb-0.5">Stationary</p>
          <p class="text-white font-bold text-[.82rem] leading-snug mb-1.5">ClearLine Ruler 30 cm</p>
          <div class="flex items-center gap-1">
            <img src="/assets/img/point.png" class="w-4 h-4">
            <span class="text-[#f5a800] font-extrabold text-[.85rem]">200</span>
          </div>
        </div>
      </div>

      <div class="bg-[#3a3852] rounded-2xl overflow-hidden cursor-pointer hover:-translate-y-1 transition-transform">
        <div class="relative bg-white rounded-xl m-2 h-[130px] overflow-hidden flex items-center justify-center">
          <img src="/assets/img/pink-bear-keychain.png" class="w-full h-full object-contain p-2"/>
          <button onclick="toggleHeart(this)" class="absolute top-2 right-2 w-8 h-8 rounded-full bg-white shadow flex items-center justify-center hover:scale-110 transition-transform z-10">
            <img src="/assets/img/unfilled-heart.png" data-state="empty" class="w-4 h-4">
          </button>
        </div>
        <div class="px-3 pb-3 pt-1">
          <p class="text-[#7a78a0] text-[.65rem] mb-0.5">Handicraft</p>
          <p class="text-white font-bold text-[.82rem] leading-snug mb-1.5">Pink Bear Keychain</p>
          <div class="flex items-center gap-1">
            <img src="/assets/img/point.png" class="w-4 h-4">
            <span class="text-[#f5a800] font-extrabold text-[.85rem]">350</span>
          </div>
        </div>
      </div>

    </div>

    <!-- Slogan -->
    <div class="bg-[#1e1c2e] rounded-2xl p-10 flex items-center justify-between gap-8">
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
    // Ganti gambar utama saat thumbnail diklik
    function changeImg(btn, src) {
      document.getElementById('main-img').src = src;
      document.querySelectorAll('.thumb-btn').forEach(b => b.classList.replace('border-[#6b5fff]', 'border-transparent'));
      btn.classList.replace('border-transparent', 'border-[#6b5fff]');
    }

    // Toggle wishlist tombol hati produk utama
    function toggleWishlist(btn) {
      const img = btn.querySelector('img');
      const filled = img.dataset.state === 'filled';
      img.src = filled ? '/assets/img/unfilled-heart.png' : '/assets/img/filled-heart.png';
      img.dataset.state = filled ? 'empty' : 'filled';
    }

    // Toggle heart pada card Another Products
    function toggleHeart(btn) {
      const img = btn.querySelector('img');
      const filled = img.dataset.state === 'filled';
      img.src = filled ? '/assets/img/unfilled-heart.png' : '/assets/img/filled-heart.png';
      img.dataset.state = filled ? 'empty' : 'filled';
    }

    // Switch tab Description / Reviews
    function switchTab(tab) {
      const isDesc = tab === 'desc';
      document.getElementById('panel-desc').classList.toggle('hidden', !isDesc);
      document.getElementById('panel-rev').classList.toggle('hidden', isDesc);
      document.getElementById('tab-desc').className = isDesc
        ? 'pb-3 text-[.9rem] font-bold text-[#a78bfa] border-b-2 border-[#a78bfa] transition-colors'
        : 'pb-3 text-[.9rem] font-semibold text-[#7a78a0] border-b-2 border-transparent hover:text-white transition-colors';
      document.getElementById('tab-rev').className = isDesc
        ? 'pb-3 text-[.9rem] font-semibold text-[#7a78a0] border-b-2 border-transparent hover:text-white transition-colors'
        : 'pb-3 text-[.9rem] font-bold text-[#a78bfa] border-b-2 border-[#a78bfa] transition-colors';
    }
  </script>
</body>
</html>