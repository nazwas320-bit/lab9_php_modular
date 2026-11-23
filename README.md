
# Praktikum 9 - PHP Modular

## Deskripsi
Project ini dibuat untuk memenuhi tugas Praktikum 9 tentang PHP Modular.

Aplikasi ini menggunakan konsep pemisahan kode PHP ke dalam beberapa file agar struktur program lebih rapi, mudah dipahami, dan mudah dikembangkan.

## Identitas
- Nama: Nazwa Salsabila
- NIM: 312510155
- Kelas: I251B

## Teknologi
- PHP
- MySQL
- HTML
- CSS
- MAMP
- Visual Studio Code

## Fitur Aplikasi
- Dashboard
- Halaman About
- Halaman Kontak
- Routing menggunakan whitelist
- Halaman 404
- Helper Functions
- Koneksi database MySQL
- CRUD User:
  - Tambah User
  - Tampil User
  - Edit User
  - Hapus User

## Struktur Folder
```text
lab9_php_modular/
├── index.php
├── .gitignore
├── README.md
├── config/
│   └── database.php
├── helpers/
│   └── functions.php
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── dashboard.php
│   ├── about.php
│   ├── kontak.php
│   └── 404.php
├── modules/
│   └── user/
│       ├── list.php
│       ├── add.php
│       ├── edit.php
│       └── delete.php
└── assets/
    └── css/
        └── style.css
```

## Cara Menjalankan Aplikasi

1. Jalankan Apache dan MySQL melalui MAMP.
2. Letakkan folder project di direktori `htdocs`.
3. Buat database dengan nama `lab9_php_modular`.
4. Buat tabel `users` dengan struktur berikut:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);
```

5. Atur koneksi database pada file `config/database.php`.
6. Buka aplikasi melalui browser:

```text
http://localhost:8888/lab9_php_modular/
```

## Contoh Routing
| Halaman | URL |
|---|---|
| Dashboard | `index.php?page=dashboard` |
| About | `index.php?page=about` |
| Kontak | `index.php?page=kontak` |
| Daftar User | `index.php?page=user` |
| Tambah User | `index.php?page=user_add` |
| Edit User | `index.php?page=user_edit&id=1` |
| Hapus User | `index.php?page=user_delete&id=1` |

## Catatan
File `config/database.php` tidak disertakan dalam repository karena berisi konfigurasi koneksi database.

Pastikan file tersebut dibuat secara lokal dan disesuaikan dengan pengaturan MySQL pada komputer masing-masing.

## Kesimpulan
Melalui praktikum ini, mahasiswa mempelajari cara membangun aplikasi PHP modular dengan pemisahan file, penggunaan helper function, routing yang aman, serta penerapan CRUD sederhana menggunakan database MySQL.
