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