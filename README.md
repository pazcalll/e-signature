<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tentang Aplikasi

Aplikasi E-Signature adalah aplikasi yang digunakan untuk melakukan penanda tanganan digital dengan verifikasi qrcode. Untuk setiap tanda tangan yang di generate melalui sistem untuk mahasiswa akan langsung diberikan gambar qrcode tepat di sebelah kanan tanda tangan dari dosen terkait untuk membuktikan bahwa tanda tangan tersebut adalah sah.

Aplikasi dibuat dengan Laravel sebagai framework utama berbasis PHP, jQuery sebagai library tambahan untuk mengatur antarmuka dengan dasar JavaScript, HTML, dan CSS. 

## Pemasangan Aplikasi Pada Komputer/Laptop

1. Clone project dalam bentuk zip dan ekstrak zip-nya.Buka cmd atau powershell dan arahkan menuju ke direktori dari aplikasi yang sudah di ekstrak tadi.

2. Pasang Laravel dependency dengan memasukkan perintah di bawah ke dalam cmd atau powershell.
```
composer install
```

3. Duplikat file .env.example dan ubah namanya menjadi .env saja di tempat yang sama.

4. Ciptakan key baru untuk project di dalam .env file dengan perintah artisan di bawah.
```
php artisan key:generate
```

5. Buat database baru, kemudian ubah DB_DATABASE pada .env file menjadi sama dengan nama database yang baru dibuat tadi dan biarkan database kosong terlebih dahulu.

6. Jalankan perintah untuk migrasi database pada cmd atau powershell yang sudah mengarah ke direktori project.
```
php artisan migrate:fresh
```

7. Jalankan perintah untuk membuat server local project.
```
php artisan serve
```

8. Buat 2 folder baru di dalam ```storage/app/public``` dengan nama ```personal ``` dan ```response```

9. Akses ```http://127.0.0.1:8000``` pada browser