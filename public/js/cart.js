function updateSubtotal() {
    let total = 0;
    document.querySelectorAll('#cart .item').forEach(item => {
      const qty   = parseInt(item.querySelector('.qty').textContent) || 0;
      const price = parseInt(item.querySelector('.price').textContent) || 0;
      total += qty * price;
    });
    document.getElementById('subtotal').textContent = total.toLocaleString('id-ID');
    document.getElementById('empty-cart').classList.toggle('hidden', document.querySelectorAll('#cart .item').length > 0);
  }

  function changeQty(btn, delta) {
    const qtyEl = btn.closest('.flex').querySelector('.qty');
    qtyEl.textContent = Math.max(1, parseInt(qtyEl.textContent) + delta);
    updateSubtotal();
  }

  function deleteItem(btn) {
    btn.closest('.item').remove();
    updateSubtotal();
  }

  updateSubtotal();