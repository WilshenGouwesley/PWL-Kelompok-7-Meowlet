<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Meowlet - Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Koh+Santepheap:wght@400;700;900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="/css/dashboard.css">
</head>

<body>
  <!-- TOAST -->
  <div class="toast" id="toast"></div>

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="logo"><img src="/assets/img/logo.png" class="w-48"></div>
    <nav style="display:flex;flex-direction:column;gap:.3rem">
      <button class="nav-item active" onclick="switchTab('orders')">
        <img src="/assets/img/box.png"> Orders
      </button>
      <button class="nav-item" onclick="switchTab('products')">
        <img src="/assets/img/list.png"> Products
      </button>
    </nav>
    <div style="margin-top:auto">
      <a href="/main"
        style="display:flex;align-items:center;gap:.6rem;color:var(--muted);font-size:.8rem;font-weight:700;text-decoration:none;padding:.5rem .9rem;border-radius:10px;transition:color .2s"
        onmouseover="this.style.color='#fff'" onmouseout="this.style.color='var(--muted)'">
        ← Back to Site
      </a>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="main">

    <div class="topbar">
      <h1 id="page-title">Orders</h1>
      <div style="display:flex;align-items:center;gap:.75rem">
        <span class="badge-admin">ADMIN</span>
        <span
          style="font-size:.82rem;color:var(--muted)"><?= htmlspecialchars($_SESSION['user']['username'] ?? 'Admin') ?></span>
      </div>
    </div>

    <!-- STAT CARDS -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="label">Total Orders</div>
        <div class="value" id="stat-total"><?= (int) ($stats['total'] ?? 0) ?></div>
      </div>
      <div class="stat-card">
        <div class="label">Total Revenue</div>
        <div class="value gold"><?= number_format($stats['revenue'] ?? 0, 0, ',', '.') ?></div>
      </div>
      <div class="stat-card">
        <div class="label">Pending</div>
        <div class="value gold" id="stat-pending"><?= (int) ($stats['pending'] ?? 0) ?></div>
      </div>
      <div class="stat-card">
        <div class="label">Completed</div>
        <div class="value green"><?= (int) ($stats['completed'] ?? 0) ?></div>
      </div>
      <div class="stat-card">
        <div class="label">Cancelled</div>
        <div class="value red"><?= (int) ($stats['cancelled'] ?? 0) ?></div>
      </div>
      <div class="stat-card">
        <div class="label">Products</div>
        <div class="value" id="stat-products"><?= count($products) ?></div>
      </div>
    </div>

    <!-- ORDERS PANEL -->
    <div id="panel-orders" class="panel active">
      <div class="toolbar">
        <input type="text" id="order-search" placeholder="Search order / user…" oninput="renderOrders()"
          style="width:220px" />
        <select id="order-filter" onchange="renderOrders()">
          <option value="">All Status</option>
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="shipped">Shipped</option>
          <option value="completed">Completed</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>
      <div class="tbl-wrap">
        <table>
          <thead>
            <tr>
              <th></th>
              <th>Order No</th>
              <th>User</th>
              <th>Total</th>
              <th>Status</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="orders-tbody"></tbody>
        </table>
      </div>
    </div>

    <!-- PRODUCTS PANEL -->
    <div id="panel-products" class="panel">
      <div class="toolbar">
        <input type="text" id="product-search" placeholder="Search product…" oninput="renderProducts()"
          style="width:220px" />
        <button class="btn btn-primary" onclick="openProductModal()">+ Add Product</button>
      </div>
      <div class="tbl-wrap">
        <table>
          <thead>
            <tr>
              <th>Img</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Seller</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="products-tbody"></tbody>
        </table>
      </div>
    </div>

  </main>

  <!-- MODAL – PRODUCT FORM -->
  <div class="modal-overlay" id="product-modal">
    <div class="modal">
      <h2 id="modal-title">Add Product</h2>
      <form id="product-form" method="POST">
        <input type="hidden" name="product_id" id="form-pid" />
        <div class="form-row">
          <div class="form-group">
            <label>Product Name *</label>
            <input type="text" name="name" id="f-name" placeholder="e.g. Cat Paw Eraser" required />
          </div>
          <div class="form-group">
            <label>Category *</label>
            <input type="text" name="categories" id="f-cat" placeholder="Stationary" required />
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Price (points) *</label>
            <input type="number" name="price" id="f-price" placeholder="0" min="0" required />
          </div>
          <div class="form-group">
            <label>Seller</label>
            <input type="text" name="seller" id="f-seller" placeholder="Seller name" />
          </div>
        </div>
        <div class="form-group">
          <label>Short Description</label>
          <textarea name="short_description" id="f-short" placeholder="Brief product description…" rows="2"></textarea>
        </div>
        <div class="form-group">
          <label>Full Description</label>
          <textarea name="description" id="f-desc" placeholder="Detailed product description…" rows="4"></textarea>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Main Image filename</label>
            <input type="text" name="image" id="f-img" placeholder="product.png" />
          </div>
          <div class="form-group">
            <label>Thumbnail 1</label>
            <input type="text" name="smallimg1" id="f-img1" placeholder="product2.jpg" />
          </div>
        </div>
        <div class="form-group" style="max-width:50%">
          <label>Thumbnail 2</label>
          <input type="text" name="smallimg2" id="f-img2" placeholder="product3.jpg" />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancel" onclick="closeProductModal()">Cancel</button>
          <button type="submit" class="btn btn-primary" id="modal-submit-btn">Save Product</button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL – ORDER STATUS -->
  <div class="modal-overlay" id="status-modal">
    <div class="modal" style="max-width:360px">
      <h2>Update Order Status</h2>
      <form method="POST" id="status-form">
        <div class="form-group">
          <label>Order No</label>
          <input type="text" id="s-orderno" readonly style="opacity:.6" />
        </div>
        <div class="form-group">
          <label>New Status *</label>
          <select name="status" id="s-status">
            <option value="pending">Pending</option>
            <option value="processing">Processing</option>
            <option value="shipped">Shipped</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-cancel" onclick="closeStatusModal()">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>

  <script src="/js/dashboard.js"></script>

  <script>
    <?php
    $productsJson = json_encode($products, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    $ordersJson = json_encode($orders, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP);
    ?>

    initData(<?= $productsJson ?>, <?= $ordersJson ?>);
  </script>
</body>

</html>