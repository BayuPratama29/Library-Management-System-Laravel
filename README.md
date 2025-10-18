# Library Management System

Sistem manajemen perpustakaan berbasis web yang dibangun menggunakan framework Laravel. Sistem ini dirancang untuk memudahkan pengelolaan buku, peminjaman, dan pengguna di perpustakaan.

## Fitur Utama

### Hak Akses Admin
- Login ke dashboard admin.
- Mengelola data buku (Tambah, Baca, Ubah, Hapus).
- Mengelola data kategori buku.
- Mengelola data penerbit dan penulis.
- Mengelola akun mahasiswa.
- Melihat daftar peminjaman buku yang sedang berlangsung.
- Menambahkan, mengonfirmasi, atau menghapus transaksi peminjaman.
- Melihat laporan riwayat peminjaman.

### Hak Akses Mahasiswa
- Registrasi dan login.
- Melihat daftar buku yang tersedia.
- Mencari buku berdasarkan judul, kategori, atau penulis.
- Mengajukan permintaan peminjaman buku.
- Melihat daftar buku yang sedang dipinjam dan statusnya.
- Mengembalikan buku melalui sistem.

## Teknologi yang Digunakan

- **Framework:** [Laravel](https://laravel.com/) (Versi Terbaru)
- **Database:** MySQL
- **Frontend:** Bootstrap 5, Font Awesome, HTML5, CSS3
- **Server:** PHP 8.0+ (disarankan)

Laravel adalah framework aplikasi web dengan sintaks yang ekspresif dan elegan. Laravel mengambil alih rasa sakit dalam pengembangan dengan mempermudah tugas umum yang digunakan dalam banyak proyek web.

## Prasyarat

Sebelum Anda memulai, pastikan Anda telah menginstal:

- PHP 8.0 atau lebih tinggi
- Composer
- MySQL Server
- Git

## Instalasi

1. Clone repository ini:
   ```bash
   git clone https://github.com/BayuPratama29/Library-Management-System-Laravel.git
   cd Library-Management-System-Laravel
2. Instal dependensi PHP menggunakan Composer:
   ```bash
   composer install
3. Salin file .env.example menjadi .env dan sesuaikan konfigurasi database Anda:
   ```bash
   cp .env.example .env
Buka file .env dan ubah bagian berikut sesuai dengan pengaturan database lokal Anda:
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=library_management_system
    DB_USERNAME=nama_pengguna_mysql_anda
    DB_PASSWORD=kata_sandi_mysql_anda

4. Generate application key:
   ```bash
   php artisan key:generate
5. Jalankan migrasi database dan seeder untuk membuat tabel dan data awal:
   ```bash
   php artisan migrate --seed
6. (Opsional) Compile asset (jika menggunakan Laravel Mix):
   ```bash
   npm install && npm run dev
7. Jalankan server pengembangan Laravel:
   ```bash
   php artisan serve
8. Buka browser dan akses aplikasi di (http://localhost:8000)

## Akun Default
Setelah menjalankan seeder, akun default berikut akan tersedia:

### Admin:
Email: admin@gmail.com

Password: admin123
### Mahasiswa:
Email: student@gmail.com

Password: student123
