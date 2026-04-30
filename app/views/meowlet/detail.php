
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

  <script src="/js/detail.js">
    
  </script>