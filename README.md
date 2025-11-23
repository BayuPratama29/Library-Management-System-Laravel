[![Logo Laravel](https://download.logo.wine/logo/Laravel/Laravel-Logo.wine.png)](https://laravel.com/)

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

# Preview Web
## Halaman Welcome

<img width="1920" height="826" alt="lms" src="https://github.com/user-attachments/assets/b1ada6dd-55f9-4576-91c5-334720129465" />

## Halaman Login

<img width="1920" height="827" alt="lms1" src="https://github.com/user-attachments/assets/2df08bf2-463a-4a0f-8aee-65b8e0868979" />

## Halaman Register

<img width="1920" height="827" alt="lms2" src="https://github.com/user-attachments/assets/5460c204-d789-41bc-9f2b-22272d3ee4e7" />

## Dashboard Admin
<img width="1920" height="827" alt="lms3" src="https://github.com/user-attachments/assets/fcac9fef-b274-4266-9d31-a133b1969e08" />

## Daftar Buku
<img width="1920" height="827" alt="lms4" src="https://github.com/user-attachments/assets/80456789-14b6-47d7-98fe-eb370f39ac0c" />

## Kategori Buku

<img width="1920" height="909" alt="lms5" src="https://github.com/user-attachments/assets/97a614e5-a687-4702-80f7-251d893d4c22" />

## Daftar Penulis

<img width="1920" height="1547" alt="lms6" src="https://github.com/user-attachments/assets/2b7d6be5-de9d-4161-a6c8-4ec474f4cf61" />

## Daftar Penerbit

<img width="1920" height="827" alt="lms7" src="https://github.com/user-attachments/assets/ee84175d-fd4a-46c1-a172-2440e3240ddd" />

## Daftar Mahasiswa

<img width="1920" height="827" alt="lms8" src="https://github.com/user-attachments/assets/76da43ae-e670-4487-ab42-9a1b2868b826" />

## Daftar Peminjaman

<img width="1920" height="827" alt="lms9" src="https://github.com/user-attachments/assets/ed643d23-c500-47bc-991e-7d9351944f5e" />

## Dashboard Mahasiswa

<img width="1920" height="827" alt="lms10" src="https://github.com/user-attachments/assets/bafd9436-812d-4759-8cab-ef7e73b49e3c" />

## Daftar Buku di Perpustakaan

<img width="1920" height="827" alt="lms11" src="https://github.com/user-attachments/assets/5015ce40-8d60-4235-b9d7-e5053355219e" />

## Daftar Peminjaman Mahasiswa

<img width="1920" height="827" alt="lms12" src="https://github.com/user-attachments/assets/367aba6d-0a3b-415a-aa03-88d6f6a2b77b" />


