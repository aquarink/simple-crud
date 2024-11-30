
# Aplikasi Manajemen Siswa

Aplikasi ini adalah aplikasi sederhana berbasis PHP dengan SQLite untuk mengelola data siswa. Aplikasi mendukung operasi CRUD (Create, Read, Update, Delete).

## Panduan Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi ini:

### 1. Unduh dan Instal XAMPP

Unduh XAMPP sesuai dengan sistem operasi Anda melalui tautan berikut:

-   https://www.apachefriends.org/index.html

### 2. Unduh dan Instal Git

Unduh Git sesuai dengan sistem operasi Anda melalui tautan berikut:

-   [https://git-scm.com/](https://git-scm.com/)

### 3. Unduh Proyek

Clone repositori proyek ini menggunakan perintah berikut di terminal atau command prompt:

`git clone https://github.com/aquarink/simple-crud.git` 

atau langsung download ke

https://github.com/aquarink/simple-crud/archive/refs/heads/main.zip

### 4. Pindahkan Folder `simple-crud` ke `htdocs`

-   Masuk ke folder hasil clone proyek.
-   Salin atau pindahkan folder `php` ke dalam folder `htdocs` pada direktori instalasi XAMPP Anda.
-   Jika terdapat folder bernama `simple-crud` di `htdocs`, atau anda ingin mengubah namanya silahkan ubah nama folder proyek untuk menghindari konflik.

### 5. Ubah Izin Folder

Pastikan folder `simple-crud` dapat diakses oleh server dengan memberikan izin penuh. Gunakan perintah berikut (di terminal untuk Linux/MacOS):

`chmod -R 777 /path/to/htdocs/php` 

> **Catatan:** Ganti `/path/to/htdocs/php` dengan lokasi sebenarnya dari folder `php`.

### 6. Jalankan Aplikasi

1.  Buka browser Anda.
2.  Akses URL berikut:

    `http://localhost/simple-crud` 
    
4.  Saat pertama kali diakses, file `students.db` akan dibuat secara otomatis di dalam folder `simple-crud`. Pastikan file `students.db` telah muncul.

### 7. Uji Aplikasi

-   Pastikan aplikasi dapat melakukan operasi berikut:
    -   Tambah data siswa.
    -   Edit data siswa.
    -   Hapus data siswa.
-   Jika semua fungsi berjalan dengan baik, maka aplikasi Anda telah berhasil diinstalasi.

## Fitur

-   Mendukung database SQLite.
-   Operasi CRUD sederhana dan cepat.
-   Antarmuka yang mudah digunakan.