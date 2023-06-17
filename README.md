# Elegance Essence - Online Shop

## Framework

-   [Laravel 9](https://laravel.com/docs/9.x)
-   [TailwindCss](https://tailwindcss.com)
-   [Flowbite](https://flowbite.com/)

<hr/>

## Tools:

-   [Fonts Google](https://fonts.google.com/)
-   [Icon Bootstrap](https://icons.getbootstrap.com/)
-   [Tailwind Page Example](https://freefrontend.com/tailwind-code-examples/)

<hr/>

## Cara Install

1. Clone Repository
2. Masuk ke Folder Project
3. Jalankan perintah
    ```
    composer install
    ```
4. Duplikat file `.env.example` kemudian ubah namanya menjadi `.env`
5. Jalankan perintah
    ```
    php artisan key:generate
    ```
6. Buat database dengan nama: `elegance-essence`
7. Ubah konfigurasi database pada file `.env`
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE="elegance-essence"
    DB_USERNAME=root
    DB_PASSWORD=
    ```
8. Jalankan perintah
    ```
    php artisan migrate:fresh --seed
    ```
9. Jalankan perintah
    ```
    npm install
    ```
10. Jalankan Perintah Pada terminal / CMD ke 1
    ```
    npm run watch
    ```
11. Jalankan Perintah Pada terminal / CMD ke 2
    ```
    php artisan serve
    ```
12. Buka browser http://127.0.0.1:8000
