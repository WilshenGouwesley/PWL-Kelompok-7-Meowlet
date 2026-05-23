# <img src="/public/assets/img/logo.png" width="200">

**Meowlet** adalah aplikasi web e-commerce berbasis sekolah yang memungkinkan siswa membeli perlengkapan sekolah dan kerajinan tangan menggunakan sistem poin. Dilengkapi dengan panel admin untuk manajemen produk dan pesanan.

---

## 🖥️ Tech Stack

| Layer | Teknologi |
|---|---|
| Backend | PHP 8.1 (MVC custom, tanpa framework) |
| Database | MySQL 8.0 |
| Frontend | HTML, Tailwind CSS v4, Vanilla JavaScript |
| Font | Koh Santepheap (via Fontsource) |
| Server | Apache / Laragon (lokal) |
| Package Manager | npm (hanya untuk Tailwind CLI) |

---

## ✨ Fitur

### 👤 User
- Register & Login dengan autentikasi session
- Edit profil (username & email)
- Browse produk dengan filter kategori dan pencarian real-time
- Halaman detail produk dengan galeri gambar dan tab deskripsi/review
- Add to Cart via `localStorage`
- Cart page: ubah qty, hapus item, lihat subtotal
- **Order Now** — mengirim order ke database dan menampilkan popup sukses dengan nomor order

### 🛠️ Admin
- Dashboard dengan statistik: total order, total revenue, pending, completed, cancelled, jumlah produk
- Manajemen **Produk**: tambah, edit, hapus produk
- Manajemen **Pesanan**: lihat detail item per order, ubah status, hapus pesanan
- Filter dan pencarian order berdasarkan status / nomor order / username

---

## 📁 Struktur Proyek

```
meowlet/
├── app/
│   ├── config/
│   │   └── app.php               # Konfigurasi database
│   ├── controllers/
│   │   ├── AdminController.php   # Dashboard & manajemen admin
│   │   ├── authController.php    # Login & register
│   │   ├── OrderController.php   # Endpoint POST /order/place
│   │   └── viewsController.php   # Routing halaman user
│   ├── core/
│   │   ├── Controller.php        # Base controller
│   │   ├── Database.php          # Koneksi MySQLi
│   │   └── Router.php            # Custom router
│   ├── models/
│   │   ├── Order.php             # Model order + order_items
│   │   ├── Product.php           # Model produk
│   │   └── User.php              # Model user
│   ├── resources/css/
│   │   └── input.css             # Source Tailwind CSS
│   └── views/
│       ├── layouts/
│       │   ├── app.php           # Layout utama
│       │   └── partials/         # Header & footer
│       └── meowlet/
│           ├── admin/dashboard.php
│           ├── cart.php
│           ├── detail.php
│           ├── main.php
│           ├── products.php
│           ├── profile.php
│           ├── editprofile.php
│           ├── login.php
│           ├── register.php
│           └── aboutus.php
├── public/
│   ├── assets/img/               # Aset gambar produk & UI
│   ├── css/
│   │   ├── output.css            # Tailwind CSS hasil build
│   │   └── dashboard.css         # Styling khusus admin
│   ├── js/
│   │   ├── cart.js
│   │   ├── detail.js
│   │   ├── main.js
│   │   ├── products.js
│   │   ├── dashboard.js
│   │   ├── profile.js
│   │   └── registerlogin.js
│   └── index.php                 # Entry point & routing
├── package.json
└── README.md
```

---

## ⚙️ Instalasi & Setup

### Prasyarat
- **PHP 8.1+**
- **MySQL 8.0+**
- **Node.js & npm** (untuk build Tailwind CSS)
- **Laragon** / **XAMPP** / web server lokal lainnya

### Langkah Instalasi

**1. Clone repository**
```bash
git clone https://github.com/username/meowlet.git
cd meowlet
```

**2. Import database**

Buka phpMyAdmin atau MySQL CLI, buat database baru, lalu import file SQL:
```bash
mysql -u root -p meowlet_db < meowlet_db.sql
```
Atau lewat phpMyAdmin: buat database `meowlet_db` → Import → pilih `meowlet_db.sql`.

**3. Konfigurasi database**

Edit file `app/config/app.php`:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');       // sesuaikan
define('DB_PASSWORD', '');       // sesuaikan
define('DB_NAME', 'meowlet_db');
```

**4. Install dependencies Tailwind**
```bash
npm install
```

**5. Build CSS** (opsional — `output.css` sudah tersedia)
```bash
npm run dev
```

**6. Konfigurasi Virtual Host**

Arahkan document root ke folder `public/`. Contoh untuk Laragon, buat virtual host:
```
Root: /path/to/meowlet/public
URL:  http://meowlet.test
```

Atau jika pakai XAMPP, tambahkan di `httpd-vhosts.conf`:
```apache
<VirtualHost *:80>
    ServerName meowlet.test
    DocumentRoot "C:/xampp/htdocs/meowlet/public"
    <Directory "C:/xampp/htdocs/meowlet/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**7. Akses aplikasi**

Buka browser dan akses:
```
http://meowlet.test/login
```

---

## 🗺️ Routes

| Method | URL | Keterangan |
|---|---|---|
| GET | `/login` | Halaman login |
| GET | `/register` | Halaman register |
| POST | `/login` | Proses login |
| POST | `/register` | Proses register |
| GET | `/main` | Halaman utama |
| GET | `/main/products` | Daftar produk |
| GET | `/main/detail/{id}` | Detail produk |
| GET | `/main/cart` | Halaman cart |
| GET | `/profile` | Profil user |
| GET | `/main/editprofile` | Edit profil |
| POST | `/profile/update` | Simpan perubahan profil |
| **POST** | **`/order/place`** | **Buat order baru (JSON API)** |
| GET | `/admin` | Dashboard admin |
| POST | `/admin/products/store` | Tambah produk |
| POST | `/admin/products/{id}/update` | Edit produk |
| POST | `/admin/products/{id}/delete` | Hapus produk |
| POST | `/admin/orders/{id}/status` | Update status order |
| POST | `/admin/orders/{id}/delete` | Hapus order |
| GET | `/admin/order-items/{id}` | Detail item order (JSON) |

---

## 🗄️ Skema Database

### `users`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key, auto increment |
| username | VARCHAR(50) | Unique |
| email | VARCHAR(100) | Unique |
| password | VARCHAR(255) | Bcrypt hash |

### `products`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| name | VARCHAR(255) | Nama produk |
| short_description | VARCHAR(500) | Deskripsi singkat |
| price | DECIMAL(10,2) | Harga dalam poin |
| image | VARCHAR(255) | Nama file gambar utama |
| description | TEXT | Deskripsi lengkap |
| seller | VARCHAR(255) | Nama penjual |
| categories | VARCHAR(255) | Kategori produk |
| smallimg1 | VARCHAR(255) | Gambar thumbnail 1 |
| smallimg2 | VARCHAR(255) | Gambar thumbnail 2 |

### `orders`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| order_no | VARCHAR(20) | Nomor order unik (ORD-YYYYXXXX) |
| user_id | INT | FK → users.id |
| total_price | DECIMAL(10,2) | Total harga |
| status | ENUM | pending / processing / shipped / completed / cancelled |
| note | TEXT | Catatan order |
| created_at | DATETIME | Waktu dibuat |
| updated_at | DATETIME | Waktu diperbarui |

### `order_items`
| Kolom | Tipe | Keterangan |
|---|---|---|
| id | INT | Primary key |
| order_id | INT | FK → orders.id |
| product_id | INT | FK → products.id |
| qty | INT | Jumlah |
| unit_price | DECIMAL(10,2) | Harga satuan saat order |
| subtotal | DECIMAL(10,2) | Generated: qty × unit_price |

---

## 👥 Tim Pengembang

| Nama | Role |
|---|---|
| Wilshen Gouwesley | Front-End & Back-End Developer |
| Leonardo Agustin | Front-End & Back-End Developer |
| Quinlen Medelline | UI/UX Designer |
| Sandrika Marcella Jolie | UI/UX Designer |

> Proyek ini dibuat sebagai tugas mata pelajaran **Pemrograman Web Lanjutan (PWL)** — Kelompok 7.
