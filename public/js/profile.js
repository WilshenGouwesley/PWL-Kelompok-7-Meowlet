const FAV_KEY = 'saquwile_favourites';
 
function getFavourites() {
  try { return JSON.parse(localStorage.getItem(FAV_KEY)) || []; }
  catch { return []; }
}
 
function saveFavourites(favs) {
  localStorage.setItem(FAV_KEY, JSON.stringify(favs));
}
 
/* Format tanggal ISO → DD/MM/YY */
function formatDate(iso) {
  if (!iso) return '–';
  const d = new Date(iso);
  const dd = String(d.getDate()).padStart(2, '0');
  const mm = String(d.getMonth() + 1).padStart(2, '0');
  const yy = String(d.getFullYear()).slice(2);
  return `${dd}/${mm}/${yy}`;
}
 
/* Hapus satu produk dari favourites */
function removeFavourite(name) {
  let favs = getFavourites();
  favs = favs.filter(f => f.name !== name);
  saveFavourites(favs);
  renderFavourites();
}
 
/* Hapus semua */
function deleteAllFavourites() {
  const cards = document.querySelectorAll('.fav-card');
  if (cards.length === 0) { alert('No favourites left.'); return; }
  if (!confirm('Hapus semua produk favorit?')) return;
 
  cards.forEach((card, i) => {
    setTimeout(() => {
      card.style.transition = 'all .4s ease';
      card.style.opacity    = '0';
      card.style.transform  = 'scale(.9)';
      card.style.height     = '0px';
      card.style.margin     = '0px';
      card.style.padding    = '0px';
      card.style.overflow   = 'hidden';
      setTimeout(() => card.remove(), 400);
    }, i * 100);
  });
}
 
/* Sort favourites */
function sortFavourites() {
  const val  = document.getElementById('sortSelect').value;
  let favs   = getFavourites();
 
  favs.sort((a, b) => {
    const dateA = new Date(a.addedAt || 0);
    const dateB = new Date(b.addedAt || 0);
    switch (val) {
      case 'latest':     return dateB - dateA;
      case 'oldest':     return dateA - dateB;
      default:           return 0;
    }
  });
 
  saveFavourites(favs);
  renderFavourites();
}
 
/* Render semua kartu dari localStorage */
function renderFavourites() {
  const grid  = document.getElementById('fav-grid');
  const empty = document.getElementById('fav-empty');
  const favs  = getFavourites();
 
  grid.innerHTML = '';
 
  if (favs.length === 0) {
    empty.classList.remove('hidden');
    return;
  }
  empty.classList.add('hidden');
 
  favs.forEach(fav => {
    const card = document.createElement('div');
    card.className = 'fav-card product-card bg-[#2d2b3d] rounded-2xl p-3 flex flex-col gap-3 shadow-[0_4px_12px_rgba(0,0,0,0.25)] hover:scale-[1.01] transition';
    card.dataset.date   = fav.addedAt || '';
    card.dataset.bought = fav.boughtCount || 0;
 
    card.innerHTML = `
      <!-- Baris atas: gambar + info + heart -->
      <div class="flex gap-3 items-start">
 
        <!-- Gambar -->
        <div class="w-[90px] h-[90px] bg-[#f3f3f3] rounded-xl flex items-center justify-center shrink-0">
          <img src="${fav.img || ''}" class="w-14 h-14 object-contain"/>
        </div>
 
        <!-- Info -->
        <div class="flex-1 min-w-0">
          <h2 class="text-white text-[.85rem] font-extrabold leading-snug break-words">${fav.name}</h2>
          <p class="text-[#aaa] text-[.72rem] mt-1">Added on ${formatDate(fav.addedAt)}</p>
          <p class="flex items-center gap-1 mt-1">
            <img src="/assets/img/point.png" class="w-4 h-4">
            <span class="text-[#f5a800] font-extrabold text-[.85rem]">${fav.price || '–'}</span>
          </p>
        </div>
 
        <!-- Heart -->
        <button onclick="toggleProfileHeart(this, '${fav.name.replace(/'/g, "\\'")}')"
          class="w-8 h-8 rounded-full bg-white flex items-center justify-center shadow-md hover:scale-110 transition shrink-0">
          <img src="/assets/img/filled-heart.png" class="w-6 h-6" data-state="filled">
        </button>
 
      </div>
 
      <!-- Baris bawah: tanggal + trash -->
      <div class="flex items-center justify-between">
        <p class="text-[#888] text-[.65rem]">Ditambahkan ${formatDate(fav.addedAt)}</p>
        <button onclick="removeFavourite('${fav.name.replace(/'/g, "\\'")}')" class="hover:scale-110 transition">
          <img src="/assets/img/trash-can.png" class="w-5 h-5 opacity-70 hover:opacity-100"/>
        </button>
      </div>
    `;
 
    grid.appendChild(card);
  });
}
 
function toggleProfileHeart(btn, name) {
  const img   = btn.querySelector('img');
  const state = img.dataset.state;
 
  if (state === 'filled') {
    /* Unfavourite */
    img.src           = '/assets/img/unfilled-heart.png';
    img.dataset.state = 'empty';
 
    let favs = getFavourites();
    favs     = favs.filter(f => f.name !== name);
    saveFavourites(favs);
 
    /* Hapus kartu dengan animasi */
    const card = btn.closest('.fav-card');
    if (card) {
      card.style.transition = 'all .4s ease';
      card.style.opacity    = '0';
      card.style.transform  = 'scale(.9)';
      card.style.height     = '0px';
      card.style.margin     = '0px';
      card.style.padding    = '0px';
      card.style.overflow   = 'hidden';
      setTimeout(() => {
        card.remove();
        if (getFavourites().length === 0) {
          document.getElementById('fav-empty').classList.remove('hidden');
        }
      }, 400);
    }
  }
}
 
function toggle(id) {
  const body  = document.getElementById('b-' + id);
  const arrow = document.getElementById('arrow-' + id);
  const isOpen = body.dataset.open === '1';
  if (isOpen) {
    body.style.maxHeight  = '0';
    body.dataset.open     = '0';
    arrow.style.transform = 'rotate(0deg)';
  } else {
    body.style.maxHeight  = body.scrollHeight + 'px';
    body.dataset.open     = '1';
    arrow.style.transform = 'rotate(180deg)';
  }
}
 
document.addEventListener('DOMContentLoaded', () => {
  renderFavourites();
 
  const recBody = document.getElementById('b-rec');
  if (recBody) recBody.style.maxHeight = recBody.scrollHeight + 'px';
});