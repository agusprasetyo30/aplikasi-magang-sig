## How to use
1. Clone repository ini
2. setelah itu masuk ke folder, dan ketik di terminal `composer install` agar file bisa digunakan
3. Rubah file `.env.example` menjadi `.env`, kemudian ketik di terminal `php artisan key:generate` untuk menginisialisasi KEY
4. isi data berikut di file `.env` sesuai dengan db yang dibuat
	```env
	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=nama_database
	DB_USERNAME=username_phpmyadmin (biasanya root)
	DB_PASSWORD=
	```
5. setelah sukses, tambahkan tabel dengan migrate, caranya adalah dengan ketik di terminal `php artisan migrate`
6. Untuk membuat user khusus ADMIN, maka tambahkan seeder, dengan cara ketik di terminal `php artisan db:seed`
7. setelah sukses, yaudah selesai berarti
## Library used

- laravel/fortify
- yajra/laravel-datatables
- yajra/laravel-datatables-oracle
- barryvdh/laravel-ide-helper