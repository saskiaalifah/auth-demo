# Laravel Authentication & Breeze — auth-demo

## Requirement
- PHP 8.2+
- Composer
- Node.js v20+
- MySQL / XAMPP / Laragon

## Langkah Menjalankan Project

### 1. Clone Repository
```bash
git clone https://github.com/USERNAMEKAMU/auth-demo.git
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

### 4. Edit file `.env`
Sesuaikan bagian database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=auth_demo
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Buat Database
Buka phpMyAdmin → buat database baru bernama `auth_demo`

### 6. Jalankan Migrasi
```bash
php artisan migrate
```

### 7. Build Frontend
```bash
npm run build
```

### 8. Jalankan Server
```bash
php artisan serve
```

### 9. Buka di Browser
```
http://127.0.0.1:8000
```

---

## Cara Melihat Semua Fitur

### ✅ Register & Login
1. Buka `http://127.0.0.1:8000/register`
2. Isi Nama, Email, Password, dan No. HP
3. Klik Register → otomatis masuk Dashboard
4. Di Dashboard tampil Nama, Email, dan No. HP

### ✅ Logout & Login Ulang
1. Klik nama di pojok kanan atas → Log Out
2. Klik Log In → masuk dengan akun yang tadi dibuat

### ✅ Proteksi Route (Middleware Auth)
1. Pastikan sudah logout
2. Akses langsung `http://127.0.0.1:8000/dashboard`
3. Otomatis diarahkan ke halaman Login

### ✅ Halaman Profil + No. HP
1. Login → klik nama di pojok kanan atas → Profile
2. Ubah No. HP → klik Save
3. Muncul tulisan "Saved."

### ✅ Halaman Admin
Set salah satu akun menjadi admin:
```bash
php artisan tinker
App\Models\User::where('email', 'isi@emailakun.com')->update(['role' => 'admin']);
exit
```
1. Login dengan akun admin
2. Buka `http://127.0.0.1:8000/admin`
3. Tampil tabel daftar semua user beserta role

### ✅ Akses Ditolak (403)
1. Register akun baru (role otomatis: user)
2. Login dengan akun baru tersebut
3. Buka `http://127.0.0.1:8000/admin`
4. Muncul halaman error **403 — Akses ditolak**