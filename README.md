# Task Manager - UTS Pemrograman Web II

## Nama

Maria Santi Moruk

## NIM

[202359201019]

## Pernyataan

Kode sumber aplikasi ini dibuat oleh saya Maria Santia pada 13 Juni 2026 untuk mengerjakan soal Remedial UTS Pemrograman Web II.

---

## Deskripsi Aplikasi

Task Manager adalah aplikasi berbasis Laravel yang digunakan untuk mencatat dan mengelola tugas harian.

Fitur yang tersedia:

* Melihat daftar tugas
* Menambahkan tugas baru
* Mengedit tugas yang belum selesai
* Menghapus tugas yang belum selesai
* Menandai tugas sebagai selesai
* Dashboard statistik tugas
* Laporan tugas selesai berdasarkan rentang tanggal
* Testing menggunakan Laravel Feature Test

---

## Teknologi yang Digunakan

* Laravel 13
* PHP 8.3
* SQLite
* Bootstrap 5
* Git
* GitHub

---

## Cara Menjalankan

1. Clone repository

```bash
git clone [URL_REPOSITORY]
```

2. Masuk ke folder project

```bash
cd moruk
```

3. Install dependency

```bash
composer install
```

4. Buat database SQLite

```bash
touch database/database.sqlite
```

5. Jalankan migrasi

```bash
php artisan migrate
```

6. Jalankan server

```bash
php artisan serve
```

7. Buka browser

```text
http://127.0.0.1:8000
```

---

## Menjalankan Testing

```bash
php artisan test
```
