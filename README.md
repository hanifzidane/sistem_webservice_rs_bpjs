# 🏥 Web Service Simulasi RS & BPJS (PHP Native)

![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)
![phpMyAdmin](https://img.shields.io/badge/phpMyAdmin-DB%20Manager-F89C0E?logo=phpmyadmin&logoColor=white)
![Status](https://img.shields.io/badge/Project-Academic-success)

Proyek ini merupakan **simulasi web service antara Rumah Sakit (RS) dan BPJS** menggunakan **PHP Native dan MySQL**.  
Sistem ini dibuat untuk **pembelajaran, tugas kuliah, praktikum web service, serta demonstrasi konsep integrasi sistem antar instansi**.

> ⚠️ **Catatan:**  
> Proyek ini adalah **simulasi akademik**, bukan sistem resmi BPJS atau Rumah Sakit.

---

## 📌 Latar Belakang

Dalam sistem nyata, Rumah Sakit perlu melakukan **validasi kepesertaan BPJS** sebelum memberikan layanan kesehatan.  
Melalui proyek ini, dibuat simulasi sederhana di mana:
- **RS bertindak sebagai client**
- **BPJS bertindak sebagai server / web service**
- Data dipertukarkan menggunakan **HTTP & JSON**

---

## ✨ Fitur Utama

### 🔹 Modul Rumah Sakit (RS)
- CRUD Data Pasien (Create, Read, Update, Delete)
- Validasi NIK **16 digit numerik**
- Cek status kepesertaan BPJS melalui web service
- Tampilan UI modern, bersih, dan konsisten
- Proteksi **SQL Injection** dengan Prepared Statement
- Escape output untuk mencegah **XSS**

### 🔹 Modul BPJS
- CRUD Data Peserta BPJS
- Status kepesertaan:
  - **AKTIF**
  - **NONAKTIF**
- Endpoint web service simulasi (`ws_bpjs.php`)
- Validasi input server-side
- Response data dalam format **JSON terstruktur**

---

## 🛠️ Teknologi yang Digunakan

| Teknologi | Keterangan |
|---------|------------|
| PHP Native | Backend logic (procedural) |
| MySQL / MariaDB | Database utama |
| phpMyAdmin | Manajemen database |
| HTML5 | Struktur halaman |
| CSS3 | Tampilan UI |
| MySQLi Prepared Statement | Keamanan query |
| Laragon / XAMPP | Local development server |

---

## 📂 Struktur Folder

```text
webservice/
│
├── rs/                         # Modul Rumah Sakit (Client)
│   ├── db_rs.php               # Koneksi database RS
│   ├── index.php               # Halaman utama & data pasien
│   ├── regis_rs.php            # Tambah pasien
│   ├── edit_rs.php             # Form edit pasien
│   ├── update_rs.php           # Proses update data
│   ├── hapus_rs.php            # Hapus data pasien
│   └── cek_data_rs.php         # Cek status BPJS ke web service
│
├── bpjs/                       # Modul BPJS (Server)
│   ├── db_bpjs.php             # Koneksi database BPJS
│   ├── index.php               # Data peserta BPJS
│   ├── regis_bpjs.php          # Tambah peserta BPJS
│   ├── edit_bpjs.php           # Edit peserta BPJS
│   ├── update_bpjs.php         # Update data BPJS
│   ├── hapus_bpjs.php          # Hapus peserta BPJS
│   └── ws_bpjs.php             # Web service BPJS (JSON)
│
└── README.md                   # Dokumentasi proyek
