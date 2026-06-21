# 🏨 SIG Hotel Banda Aceh

Sistem Informasi Geografis untuk Rekomendasi dan Penentuan Rute Terpendek Penginapan di Banda Aceh menggunakan Metode **Multi Attribute Utility Theory (MAUT)** dan **Algoritma A\***.

---

## 📌 Tentang Sistem

Sistem ini dikembangkan sebagai bagian dari penelitian skripsi di Universitas Malikussaleh, Fakultas Teknik, Program Studi Teknik Informatika. Sistem ini membantu wisatawan dalam:

- Mendapatkan **rekomendasi penginapan terbaik** di Banda Aceh berdasarkan metode MAUT
- Menentukan **rute terpendek** menuju penginapan yang dipilih menggunakan Algoritma A\*
- Memvisualisasikan lokasi penginapan pada **peta interaktif** berbasis Leaflet.js dan OpenStreetMap

---

## 👨‍💻 Informasi Penelitian

| Field | Detail |
|-------|--------|
| **Judul** | Sistem Informasi Geografis untuk Rekomendasi dan Penentuan Rute Terpendek Penginapan di Banda Aceh Menggunakan Metode MAUT dan Algoritma A* |
| **Peneliti** | Ivan Ghazi |
| **NIM** | 200170241 |
| **Program Studi** | Teknik Informatika |
| **Fakultas** | Fakultas Teknik |
| **Universitas** | Universitas Malikussaleh |
| **Tahun** | 2025 |

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Keterangan |
|-----------|-------|------------|
| PHP | 8.x | Backend language |
| Laravel | 12.x | PHP Framework |
| MySQL | 8.x | Database |
| Leaflet.js | 1.9.4 | Peta interaktif |
| OpenStreetMap | - | Tile layer peta |
| OSRM | - | API routing rute terpendek |
| Tabler UI | Latest | CSS Framework |
| Composer | 2.x | PHP package manager |

---

## ⚙️ Persyaratan Sistem

Sebelum instalasi, pastikan sistem Anda memiliki:

- **PHP** >= 8.1
- **Composer** >= 2.0
- **MySQL** >= 8.0
- **Node.js** >= 18.x dan **NPM**
- **XAMPP** / **Laragon** / **Herd** (untuk local development)
- Web browser modern (Chrome, Firefox, Edge)

---

## 🚀 Cara Instalasi

### 1. Clone atau Download Repository

```bash
git clone https://github.com/username/hotel-aceh.git
cd hotel-aceh
```

Atau download ZIP dan ekstrak ke folder `htdocs` (XAMPP) atau folder project Anda.

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Install Dependency JavaScript

```bash
npm install
npm run build
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`:

```bash
cp .env.example .env
```

Lalu generate application key:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Buka file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_aceh
DB_USERNAME=root
DB_PASSWORD=
```

Buat database baru di phpMyAdmin atau MySQL dengan nama `hotel_aceh`.

### 6. Jalankan Migration

```bash
php artisan migrate
```

### 7. Jalankan Seeder (Buat Akun Admin)

```bash
php artisan db:seed
```

Akun default yang dibuat:
- **Email:** `admin@gmail.com`
- **Password:** `admin123`

### 8. Jalankan Server

```bash
php artisan serve
```

Akses aplikasi di browser: `http://127.0.0.1:8000`

---

## 📂 Struktur Direktori

```
hotel-aceh/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AlternativeController.php
│   │       ├── CriteriaController.php
│   │       ├── DashboardController.php
│   │       ├── HotelController.php
│   │       ├── MatriksController.php
│   │       ├── MautController.php
│   │       ├── RouteController.php
│   │       └── UserController.php
│   └── Models/
│       ├── Alternative.php
│       ├── Criteria.php
│       ├── Hotel.php
│       ├── HotelCriteriaValue.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   └── views/
│       ├── alternatives/
│       ├── auth/
│       ├── criterias/
│       ├── dashboard/
│       ├── hotels/
│       ├── layouts/
│       ├── matriks/
│       ├── maut/
│       ├── route/
│       ├── users/
│       ├── tentang.blade.php
│       └── welcome.blade.php
├── routes/
│   └── web.php
└── README.md
```

---

## 📋 Fitur Sistem

### 🔐 Autentikasi
- Login & Logout admin
- Manajemen user (CRUD)

### 🏨 Data Master
- **Data Hotel** — CRUD data penginapan dengan input lokasi via klik peta, upload Excel
- **Data Kriteria** — CRUD kriteria penilaian dengan bobot (total bobot = 1)
- **Data Alternatif** — Input nilai setiap hotel berdasarkan kriteria
- **Matriks Keputusan** — Tampilan matriks nilai + normalisasi interaktif

### 🧮 Sistem Rekomendasi MAUT
- Normalisasi matriks keputusan
- Perhitungan nilai utilitas setiap alternatif
- Perangkingan hasil MAUT
- Visualisasi hasil pada peta interaktif

### 🗺️ Rute Terpendek A\*
- Pilih hotel tujuan berdasarkan ranking MAUT
- Deteksi lokasi user otomatis (GPS) atau klik peta
- Perhitungan rute menggunakan OSRM (OpenStreetMap Routing Machine)
- Informasi jarak, estimasi waktu, dan detail perhitungan A\*

---

## 🔢 Metode yang Digunakan

### Multi Attribute Utility Theory (MAUT)

MAUT digunakan untuk mengkonversi berbagai kriteria menjadi nilai numerik skala 0-1.

**Rumus Normalisasi:**

Untuk kriteria **Benefit:**
```
U(x) = (x - x_min) / (x_max - x_min)
```

Untuk kriteria **Cost:**
```
U(x) = (x_max - x) / (x_max - x_min)
```

**Rumus Nilai Total:**
```
V(x) = Σ Wi × Ui(x)
```

### Algoritma A\* (A-Star)

Algoritma A\* digunakan untuk mencari rute terpendek dengan fungsi evaluasi:

```
f(n) = g(n) + h(n)
```

- `g(n)` = Jarak aktual rute (dari OSRM)
- `h(n)` = Estimasi heuristik menggunakan **Haversine Distance**
- `f(n)` = Total biaya estimasi

**Rumus Haversine:**
```
a = sin²(Δlat/2) + cos(lat1) × cos(lat2) × sin²(Δlon/2)
c = 2 × atan2(√a, √(1-a))
d = R × c  (R = 6371 km)
```

---

## 📊 Kriteria Penilaian

| Kriteria | Tipe | Bobot | Keterangan |
|----------|------|-------|------------|
| Harga | Cost | 0.30 | Semakin murah semakin baik |
| Fasilitas | Benefit | 0.20 | Jumlah fasilitas yang tersedia |
| Rating | Benefit | 0.30 | Rating pengguna (0-10) |
| Bintang | Benefit | 0.20 | Klasifikasi bintang hotel (1-5) |

---

## 🌐 API yang Digunakan

| API | Endpoint | Keterangan |
|-----|----------|------------|
| OSRM | `https://router.project-osrm.org` | Routing rute terpendek |
| Nominatim | `https://nominatim.openstreetmap.org` | Geocoding pencarian lokasi |
| OpenStreetMap | `https://{s}.tile.openstreetmap.org` | Tile layer peta |

---

## 📸 Tampilan Sistem

### Halaman Utama (Landing Page)
Menampilkan informasi sistem, fitur, dan cara kerja.

### Dashboard Admin
Menampilkan statistik total hotel, kriteria, dan peta sebaran hotel.

### Data Hotel
CRUD data hotel dengan fitur klik peta untuk input koordinat.

### Perhitungan MAUT
Menampilkan nilai utilitas, ranking hotel, dan peta rekomendasi.

### Rute Terpendek
Peta interaktif dengan pencarian rute A\* dan detail perhitungan.

---

## 🐛 Troubleshooting

### Migration Error: Foreign Key Constraint
Pastikan urutan migration sudah benar. Jalankan:
```bash
php artisan migrate:fresh
```

### Page Expired (419)
Hapus cache dan session:
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### View Not Found
Pastikan nama file blade sesuai dan tidak ada typo. Jalankan:
```bash
php artisan view:clear
```

---

## 📄 Lisensi

Sistem ini dikembangkan untuk keperluan penelitian akademik di Universitas Malikussaleh.

---

## 📞 Kontak

**Ivan Ghazi**  
Program Studi Teknik Informatika  
Fakultas Teknik, Universitas Malikussaleh  
NIM: 200170241