function toggleHeart(btn) {
    const img = btn.querySelector('img');
    if (img.dataset.state === 'filled') {
      img.src = '/assets/img/unfilled-heart.png';
      img.dataset.state = 'empty';
    } else {
      img.src = '/assets/img/filled-heart.png';
      img.dataset.state = 'filled';
    }
  }

  function toggleAdded(btn) {
    const added = btn.dataset.added === '1';
    btn.dataset.added = added ? '' : '1';
    btn.textContent = added ? 'Add to Cart' : '+ Added';
    btn.style.background = added ? '' : '#5a5890';
  }

  function filterProducts() {
    const query = document.getElementById('search-input').value.toLowerCase().trim();
    const activeCats = [];
    document.querySelectorAll('.cat-btn').forEach(b => {
      if (b.dataset.active === '1') activeCats.push(b.dataset.cat);
    });

    let visible = 0;
    document.querySelectorAll('.product-card').forEach(card => {
      const name = card.dataset.name || '';
      const tags = (card.dataset.tags || '').split(',').map(t => t.trim().toLowerCase());
      const matchSearch = !query || name.includes(query);
      const matchCat = activeCats.length === 0 || activeCats.some(cat => tags.some(tag => tag.includes(cat) || cat.includes(tag)));
      card.style.display = (matchSearch && matchCat) ? '' : 'none';
      if (matchSearch && matchCat) visible++;
    });

    document.getElementById('empty-state').classList.toggle('hidden', visible > 0);
  }

  function toggleCategory(btn) {
    const isActive = btn.dataset.active === '1';
    const circle = btn.querySelector('.cat-circle');
    const label  = btn.querySelector('.cat-label');
    const badge  = btn.querySelector('.cat-badge');
    btn.dataset.active = isActive ? '0' : '1';
    circle.style.background = isActive ? '#4a4870' : '#6b5fff';
    circle.style.boxShadow  = isActive ? 'none' : '0 8px 20px rgba(107,95,255,.35)';
    label.style.color       = isActive ? '#7a78a0' : '#fff';
    label.style.fontWeight  = isActive ? '600' : '700';
    badge.style.display     = isActive ? 'none' : 'flex';
    filterProducts();
  }

  filterProducts();