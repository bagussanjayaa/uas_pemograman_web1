# uas_pemograman_web1

# Nama: Bagus Sanjaya

# Kelas: TI.24.A.5

# NIM: 312410505

# UMKM Pre-Order System

UMKM Pre-Order adalah aplikasi web berbasis **PHP Native (MVC)** yang digunakan untuk membantu pelaku UMKM dalam mengelola produk dan pesanan pelanggan secara online dengan sistem pre-order.

Aplikasi ini memiliki dua peran pengguna, yaitu **Admin** dan **User**, dengan hak akses yang berbeda.

## Tujuan Aplikasi
- Membantu UMKM mengelola produk dengan gambar
- Memudahkan pelanggan melakukan pemesanan produk
- Memberikan kontrol penuh kepada admin untuk memproses status pesanan
- Mengimplementasikan konsep MVC dan autentikasi pengguna

## Fitur Utama

### Autentikasi
- Login User & Admin
- Pembatasan akses berdasarkan role

### Manajemen Produk (Admin)
- Tambah produk (nama, harga, deskripsi, gambar)
- Edit produk
- Hapus produk
- Pagination & pencarian produk

### Pemesanan (User)
- Melihat daftar produk
- Melakukan pemesanan
- Status awal pesanan: **Pending**

### Manajemen Pesanan (Admin)
- Melihat semua pesanan
- Update status pesanan:
  - Pending
  - Diproses
  - Selesai

### Keamanan
- Proteksi halaman admin
- Validasi session login

## Struktur Folder
UMKM_PREORDER
`
│
├── app
│ ├── controllers
| | ├── AuthController.php
| | ├── PesananController.php
| | └── ProdukController.php
| |
│ ├── models
| | ├── Pesanan.php
| | ├── Produk.php
| | └── User.php
| |
│ ├── views
| | ├── auth
| | | └── login.php
| | |
| | ├── layout
| | | ├── footer.php
| | | └── header.php
| | |
| | ├── pesanan
| | | ├── edit.php
| | | ├── form.php
| | | └── index.php
| | |
| | └── produk
| |   ├── form.php
| |   └── index.php
| |
│ └── core
|   ├── Auth.php
|   ├── Database.php
|   └── Router.php
│
├── config
| └── config.php
│
└── public
  ├── assets
  │ └── gambar
  ├── .htaccess
  └── index.php
`

## Teknologi yang Digunakan
- PHP Native (MVC)
- MySQL
- Bootstrap 5
- Apache (XAMPP)
- HTML & CSS

## Cara Menjalankan Aplikasi
1. Clone / download project
2. Simpan di folder `htdocs`
3. Import database MySQL
4. Atur koneksi database di `config/config.php`
5. Jalankan melalui browser:
http://localhost/umkm_preorder/public

## Screenshot Aplikasi
- Halaman Login

![pict](10.png)

- Halaman Produk (User)

![pict](11.png)

![pict](12.png)

- Halaman Pesanan User

![pict](13.png)

- Halaman Produk Admin

![pict](14.png)

![pict](15.png)

- Form Tambah Produk

![pict](16.png)

- Halaman Pesanan Admin

![pict](17.png)

- Edit Produk

![pict](18.png)

## Dokumentasi
- Dokumentasi PDF 
- Video Demo di YouTube 

## Developer
Nama : Bagus Sanjaya

Mata Kuliah : Pemograman Web1 

Dosen : Agung Nugroho, S.Kom., M.Kom.
