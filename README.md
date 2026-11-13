# Karl Store – Website E-Commerce Fashion

Karl Store merupakan website e-commerce sederhana yang dikembangkan sebagai platform penjualan produk fashion secara online, seperti pakaian, tas, aksesori, sepatu dan sandal. Website ini memungkinkan pengguna untuk melihat katalog produk, memilih ukuran, mengelola keranjang belanja, melakukan checkout, serta mengelola informasi akun.

Website ini juga dilengkapi dengan halaman admin untuk mengelola data produk dan kategori.

Project ini dikembangkan menggunakan PHP, MySQL, HTML, CSS, dan JavaScript.

## Demo Website

Website Karl Store dapat diakses secara online melalui tautan berikut:
[Kunjungi Karl Store Fashion](https://karl-store.infinityfreeapp.com/)

## Fitur Website

### 1. Autentikasi Pengguna
- Registrasi akun pengguna.
- Login pengguna.
- Fitur lupa password.

### 2. Katalog Produk
- Menampilkan daftar produk fashion.
- Melihat berbagai pilihan produk.
- Menampilkan informasi produk yang tersedia.

### 3. Detail Produk
- Menampilkan gambar dan informasi produk.
- Menampilkan harga dan stok produk.
- Memilih ukuran produk Bajue (S, M, L, XL).
- Memilih ukuran produk sepatu dan sandal (36, 37, 38, 39, 40, 41)
- Mengatur jumlah produk yang ingin dibeli.
- Melihat informasi produk.
- Melihat informasi pengiriman dan kebijakan pengembalian barang.

### 4. Keranjang Belanja (Shopping Cart)
- Menampilkan produk yang ditambahkan ke keranjang.
- Menampilkan ukuran, harga, kuantitas, dan total harga produk.
- Menghapus produk tertentu dari keranjang.
- Mengosongkan seluruh keranjang belanja.
- Melanjutkan aktivitas belanja.
- Memilih metode pengiriman:
  - Next Day Delivery
  - Standard Delivery
  - Personal Pickup
- Menghitung subtotal, biaya pengiriman, dan total belanja.

### 5. Checkout
- Mengisi informasi alamat penagihan:
  - Nama
  - Alamat
  - Nomor telepon
  - Email
- Menampilkan ringkasan pesanan.
- Menampilkan produk, ukuran, dan jumlah pesanan.
- Menghitung subtotal, biaya pengiriman, dan total pembayaran.
- Memilih metode pembayaran:
  - Cash on Delivery (COD)
  - Direct Bank Transfer
  - Bank Mandiri
  - BCA
  - BNI
  - BRI

### 6. Konfirmasi Pesanan (Order Confirmation)
- Menampilkan notifikasi pesanan berhasil.
- Menampilkan ID pesanan.
- Menampilkan metode pembayaran yang dipilih.
- Menampilkan informasi rekening tujuan transfer.
- Menampilkan jumlah pembayaran yang harus dibayarkan.

### 7. My Account
- Melihat informasi akun pengguna:
  - Email
  - Nama
  - Nomor telepon
  - Password (disamarkan)
  - Alamat
- Mengubah informasi profil pengguna.
- Mengganti password:
  - Password lama
  - Password baru
  - Konfirmasi password baru

### 8. Halaman Informasi dan Bantuan
- About
- Frequently Asked Questions (FAQ)
- Returns
- Shipping Information
- Our Policies

### 9. Fitur Admin
- Login dan logout admin.
- Mengelola data produk.
- Menambah, mengubah, dan menghapus produk.
- Mengelola kategori produk.
- Melihat informasi produk, stok, harga, dan status produk.

## Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| PHP | Pemrograman sisi server |
| MySQL | Pengelolaan database |
| HTML5 | Struktur halaman website |
| CSS3 | Pengaturan tampilan website |
| JavaScript | Menambahkan interaktivitas |
| Bootstrap | Membuat tampilan responsif |
| jQuery | Mendukung fungsi JavaScript |
| XAMPP | Lingkungan pengembangan lokal |
| phpMyAdmin | Pengelolaan database |

## Struktur Project

```text
karl-store/
│
├── admin/                  # Halaman admin
├── css/                    # File CSS
├── database/               # File database SQL
├── images/                 # Gambar website
├── js/                     # File JavaScript
│
├── koneksi.php             # Koneksi database
├── header.php              # Bagian header website
├── footer.php              # Bagian footer website
├── index.php               # Halaman utama
├── login.php               # Halaman login
├── register.php            # Halaman registrasi
├── detail_product.php      # Halaman detail produk
├── cart.php                # Halaman keranjang belanja
├── myaccount.php           # Halaman akun pengguna
├── about.php               # Halaman tentang kami
├── faq.php                 # Halaman pertanyaan umum
├── return.php              # Halaman pengembalian barang
├── shippinginfo.php        # Informasi pengiriman
└── ourpolicies.php         # Kebijakan toko
```

## Instalasi dan Konfigurasi

Untuk menjalankan project ini secara lokal, ikuti langkah-langkah berikut:

1. Clone repository GitHub:

   ```bash
   git clone https://github.com/snrahmawati9-pixel/karl-store.git
   ```

2. Pindahkan folder project ke direktori `htdocs` pada XAMPP.

3. Jalankan Apache dan MySQL melalui XAMPP Control Panel.

4. Buka phpMyAdmin melalui browser:

   ```text
   http://localhost/phpmyadmin
   ```

5. Buat database MySQL baru.

6. Import file SQL yang tersedia di dalam folder `database/`.

7. Sesuaikan konfigurasi koneksi database pada file `koneksi.php` dengan pengaturan MySQL lokal.

8. Buka website melalui browser:

   ```text
   http://localhost/karl-store/
   ```

## Tujuan Project

Project ini dikembangkan sebagai sarana pembelajaran dan penerapan keterampilan dalam pengembangan website, pemrograman PHP, pengelolaan database, serta pembuatan aplikasi e-commerce sederhana.

Melalui project ini, saya memperoleh pengalaman dalam membangun halaman website dinamis, mengelola database relasional, menerapkan autentikasi pengguna, serta mengembangkan berbagai fitur dasar e-commerce.

## Author

**Ama**

GitHub: [@snrahmawati9-pixel](https://github.com/snrahmawati9-pixel)
