# CinemaTix - Website Pemesanan Tiket Bioskop

CinemaTix adalah website pemesanan tiket bioskop yang profesional dan modern, dibangun dengan Laravel 12 dan Tailwind CSS. Website ini menawarkan pengalaman pemesanan tiket yang mudah dan cepat seperti XXI dan bioskop besar lainnya.

## 🎬 Fitur Utama

### Untuk Pengguna
- **Pencarian Film**: Lihat daftar film yang sedang tayang dan segera hadir
- **Detail Film**: Informasi lengkap film termasuk sinopsis, trailer, dan rating
- **Pemilihan Jadwal**: Pilih jadwal tayang yang sesuai dengan lokasi dan waktu
- **Pemilihan Kursi**: Sistem pemilihan kursi interaktif dengan visualisasi studio
- **Pemesanan Tiket**: Proses pemesanan yang mudah dan cepat
- **Sistem Pembayaran**: Informasi pembayaran yang jelas dengan batas waktu
- **Riwayat Pemesanan**: Kelola semua pemesanan tiket dalam satu tempat
- **Cetak Tiket**: Cetak tiket setelah pembayaran berhasil

### Untuk Admin (Fitur yang Dapat Dikembangkan)
- **Manajemen Film**: Tambah, edit, dan hapus data film
- **Manajemen Bioskop**: Kelola data bioskop dan studio
- **Manajemen Jadwal**: Atur jadwal tayang film
- **Laporan Penjualan**: Analisis penjualan tiket
- **Manajemen Pembayaran**: Konfirmasi dan kelola pembayaran

## 🛠️ Teknologi yang Digunakan

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/PostgreSQL
- **Authentication**: Laravel Built-in Auth
- **Icons**: Font Awesome
- **Images**: TMDB API (untuk poster film)

## 📋 Struktur Database

### Tabel Utama
1. **users** - Data pengguna
2. **movies** - Data film
3. **cinemas** - Data bioskop
4. **theaters** - Data studio/teater
5. **schedules** - Jadwal tayang film
6. **bookings** - Data pemesanan tiket
7. **payments** - Data pembayaran

### Relasi Database
- User → Bookings (One to Many)
- Movie → Schedules (One to Many)
- Cinema → Theaters (One to Many)
- Theater → Schedules (One to Many)
- Schedule → Bookings (One to Many)
- Booking → Payment (One to One)

## 🚀 Instalasi dan Setup

### Prerequisites
- PHP 8.2 atau lebih tinggi
- Composer
- MySQL/PostgreSQL
- Node.js (untuk asset compilation)

### Langkah Instalasi

1. **Clone Repository**
   ```bash
   git clone <repository-url>
   cd Tiket-Bioskop
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Setup Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Konfigurasi Database**
   Edit file `.env` dan sesuaikan konfigurasi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=cinematix
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Jalankan Migration dan Seeder**
   ```bash
   php artisan migrate:fresh --seed
   ```

6. **Compile Assets (Opsional)**
   ```bash
   npm run dev
   ```

7. **Jalankan Server**
   ```bash
   php artisan serve
   ```

8. **Akses Website**
   Buka browser dan kunjungi `http://localhost:8000`

## 📱 Halaman Website

### Halaman Publik
- **Home** (`/`) - Halaman utama dengan film yang sedang tayang
- **Movies** (`/movies`) - Daftar semua film
- **Movie Detail** (`/movies/{id}`) - Detail film dengan jadwal tayang

### Halaman User (Perlu Login)
- **Login** (`/login`) - Halaman masuk
- **Register** (`/register`) - Halaman pendaftaran
- **Bookings** (`/bookings`) - Daftar pemesanan user
- **Booking Create** (`/bookings/create/{schedule}`) - Halaman pemesanan tiket
- **Booking Detail** (`/bookings/{id}`) - Detail pemesanan

## 🎯 Alur Pemesanan Tiket

1. **Pilih Film**: User memilih film dari halaman utama atau daftar film
2. **Pilih Jadwal**: User memilih jadwal tayang yang sesuai
3. **Pilih Kursi**: User memilih kursi yang diinginkan dengan visualisasi studio
4. **Konfirmasi Pemesanan**: User mengkonfirmasi detail pemesanan
5. **Pembayaran**: User melakukan pembayaran sesuai instruksi
6. **Konfirmasi**: Admin mengkonfirmasi pembayaran
7. **Cetak Tiket**: User dapat mencetak tiket setelah pembayaran berhasil

## 🎨 Fitur UI/UX

### Design System
- **Color Scheme**: Blue primary (#1e40af), Red accent (#dc2626)
- **Typography**: Modern sans-serif fonts
- **Components**: Card-based layout dengan shadow dan rounded corners
- **Responsive**: Mobile-first design dengan breakpoints

### Interactive Elements
- **Seat Selection**: Visualisasi kursi dengan status tersedia/dipilih/dipesan
- **Hover Effects**: Smooth transitions dan hover states
- **Loading States**: Feedback visual untuk aksi user
- **Form Validation**: Real-time validation dengan error messages

## 🔧 Konfigurasi Tambahan

### Payment Gateway
Website ini menggunakan sistem pembayaran manual dengan transfer bank. Untuk integrasi payment gateway, dapat ditambahkan:
- Midtrans
- Xendit
- Doku
- Payment Gateway lainnya

### Email Notifications
Untuk notifikasi email, dapat ditambahkan:
- Konfirmasi pemesanan
- Reminder pembayaran
- Konfirmasi pembayaran
- Tiket digital

### File Upload
Untuk upload poster film, dapat ditambahkan:
- Storage configuration
- Image optimization
- CDN integration

## 📊 Data Sample

Website ini dilengkapi dengan data sample yang mencakup:
- **6 Film Populer**: Avengers, Spider-Man, Batman, Dune, James Bond, Black Widow
- **3 Bioskop**: Mall Taman Anggrek, Central Park, Grand Indonesia
- **15 Studio**: Berbagai tipe (Regular, Dolby Atmos, IMAX, 4DX, Gold Class)
- **Jadwal Tayang**: 7 hari ke depan dengan berbagai waktu

## 🔒 Keamanan

- **Authentication**: Laravel built-in authentication
- **CSRF Protection**: Cross-site request forgery protection
- **Input Validation**: Validasi input yang ketat
- **SQL Injection Protection**: Eloquent ORM protection
- **XSS Protection**: Blade template escaping

## 🚀 Deployment

### Production Setup
1. Set environment ke production
2. Optimize autoloader: `composer install --optimize-autoloader --no-dev`
3. Cache configuration: `php artisan config:cache`
4. Cache routes: `php artisan route:cache`
5. Cache views: `php artisan view:cache`
6. Setup queue worker untuk background jobs
7. Setup cron job untuk maintenance tasks

### Server Requirements
- PHP 8.2+
- MySQL 8.0+ atau PostgreSQL 13+
- Web server (Apache/Nginx)
- SSL certificate (HTTPS)

## 🤝 Kontribusi

Untuk berkontribusi pada project ini:
1. Fork repository
2. Buat feature branch
3. Commit perubahan
4. Push ke branch
5. Buat Pull Request

## 📄 License

Project ini menggunakan MIT License. Lihat file `LICENSE` untuk detail lebih lanjut.

## 📞 Support

Untuk pertanyaan atau dukungan, silakan hubungi:
- Email: support@cinematix.com
- Website: https://cinematix.com

---

**CinemaTix** - Nikmati pengalaman menonton film terbaik dengan pemesanan tiket yang mudah dan cepat! 🎬✨
