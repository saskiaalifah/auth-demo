# 🔐 Auth Demo — Laravel Authentication & Breeze

> Tugas Mata Kuliah Pemrograman Web  
> Implementasi Laravel Authentication menggunakan Laravel Breeze  
> **Nama:** Saskia Alifah  
> **Framework:** Laravel 11.x | **PHP:** 8.2+ | **Stack:** Blade + Tailwind CSS

---

## 📋 Fitur yang Diimplementasikan

| No | Fitur | Status |
|----|-------|--------|
| Dasar | Register, Login, Logout | ✅ |
| Dasar | Proteksi Route dengan Middleware `auth` | ✅ |
| Tugas 1 | Tambah field **No. HP** pada registrasi & dashboard | ✅ |
| Tugas 2 | Edit profil (nama, email, no. HP) di halaman `/profile` | ✅ |
| Tugas 3 | Halaman **Admin** dengan middleware role + daftar semua user | ✅ |

---

## ⚙️ Requirements

- PHP 8.2+
- Composer
- Node.js v20+
- MySQL (XAMPP / Laragon / MAMP)

---

## 🚀 Cara Menjalankan Project

### 1. Clone Repository

```bash
git clone https://github.com/saskiaalifah/auth-demo.git
cd auth-demo
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Edit File `.env` — Sesuaikan Database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_demo
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database

Buka **phpMyAdmin** → buat database baru dengan nama `auth_demo`

### 6. Jalankan Migrasi + Seeder

```bash
php artisan migrate --seed
```

> Perintah ini otomatis membuat semua tabel **dan** mengisi akun admin & user siap pakai.

### 7. Build Asset Frontend

```bash
npm run build
```

### 8. Jalankan Development Server

```bash
php artisan serve
```

### 9. Akses Aplikasi

```
http://127.0.0.1:8000
```

---

## 🔑 Akun Siap Pakai (Hasil Seeder)

Setelah `migrate --seed`, langsung tersedia 2 akun tanpa perlu register:

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@demo.com | password123 |
| User Biasa | user@demo.com | password123 |

---

## 🧪 Panduan Testing Fitur (untuk Dosen)

### ✅ Tugas 1 — Field No. HP pada Registrasi

1. Buka `http://127.0.0.1:8000/register`
2. Isi semua field: **Nama, Email, Password, Konfirmasi Password, No. HP**
3. Klik **Register** → otomatis masuk ke Dashboard
4. Di halaman Dashboard, tampil: **Nama, Email, dan No. HP** user yang login

**Validasi No. HP:**
- Wajib diisi
- Hanya boleh angka
- Minimal 10 karakter, maksimal 15 karakter

---

### ✅ Tugas 2 — Edit Profil dengan No. HP

1. Login dengan akun manapun
2. Klik nama di pojok kanan atas → pilih **Profile**
3. Ubah nama, email, atau No. HP → klik **Save**
4. Muncul notifikasi **"Saved."** — data berhasil diperbarui

---

### ✅ Tugas 3 — Halaman Admin + Middleware Role

**Testing akses Admin:**

1. Login dengan `admin@demo.com` / `password123`
2. Buka `http://127.0.0.1:8000/admin`
3. Tampil halaman **Daftar Semua User** beserta nama, email, no. HP, dan role

**Testing akses ditolak (403):**

1. Logout → login dengan `user@demo.com` / `password123`
2. Buka `http://127.0.0.1:8000/admin`
3. Muncul halaman error **403 — Akses Ditolak**

---

### ✅ Proteksi Route Middleware `auth`

1. Pastikan sudah **logout**
2. Akses langsung `http://127.0.0.1:8000/dashboard`
3. Otomatis diarahkan ke halaman **Login**

---

### ✅ Logout & Login Ulang

1. Klik nama di pojok kanan atas → **Log Out**
2. Klik **Log In** → masuk kembali dengan akun yang diinginkan

---

## 📁 Struktur File Penting

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/                   # Controller autentikasi (Breeze)
│   │   ├── AdminController.php     # Controller halaman admin (Tugas 3)
│   │   ├── DashboardController.php
│   │   └── ProfileController.php
│   ├── Middleware/
│   │   └── AdminMiddleware.php     # Middleware cek role admin (Tugas 3)
│   └── Requests/Auth/
│       └── LoginRequest.php
├── Models/
│   └── User.php                    # Model dengan field no_hp & role
database/
└── seeders/
│   ├── DatabaseSeeder.php          # Memanggil UserSeeder
│   └── UserSeeder.php              # Data akun admin & user siap pakai
└── migrations/
    └── xxxx_create_users_table.php # Migrasi dengan kolom no_hp & role
resources/views/
├── auth/                           # View login, register, dll
├── dashboard.blade.php             # Dashboard dengan tampilan no_hp (Tugas 1)
├── profile/edit.blade.php          # Edit profil dengan no_hp (Tugas 2)
└── admin/index.blade.php           # Halaman daftar user (Tugas 3)
routes/
├── web.php                         # Route utama + route admin
└── auth.php                        # Route autentikasi (Breeze)
```

