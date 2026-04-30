function toggle(id) {
    const arrow = document.getElementById("arrow-" + id);
    const box = document.getElementById("b-" + id);
    const isOpen = box.getAttribute("data-open") === "1";
    box.style.maxHeight = isOpen ? "0px" : box.scrollHeight + "px";
    box.setAttribute("data-open", isOpen ? "0" : "1");
    arrow.classList.toggle("rotate-180", !isOpen);
  }

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
    btn.textContent = added ? 'Add to cart' : '+ Added';
    btn.style.background = added ? '' : '#5a5890';
  }

  function toggleTask(el) {
    const done = el.dataset.done === '1';
    el.dataset.done = done ? '' : '1';
    el.style.background = done ? '' : '#7b5fff';
    el.style.borderColor = done ? '#4a4870' : '#7b5fff';
    el.textContent = done ? '' : '✓';
  }

  window.addEventListener('load', () => {
    setTimeout(() => {
      document.getElementById('prog-bar').style.width = '42%';
    }, 500);
  });