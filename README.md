# Dokumentasi Clone Laravel Using Git

## Instalasi

1.  Clone Repository
```
git clone  https://github.com/Didinzz/sim-project.git
```
```
cd sim-project
```
2. Instalasi Depedencies untuk menginstall depenecies PHP dan Javascript

```
composer install
```
```
npm install
```

3. Konfigurasi Environment Salin file .env.example menjadi .env dan sesuaikan konfigurasi database serta pengaturan lainnya:

```
cp env.example .env
```
```
php artisan key:migrate
```

4. Jalankan Seeder dan Migrasi database untuk tabel-tabel yang diperlukan
```
php artisan migrate --seed
```
5. Link Storage Jalankan symlink untuk menghubungkan folder storage public
```
php artisan storage:link
```
6. Jalankan Server laravel dengan menggunakan
```
php artisan serv
```
7. Buka/tambah terminal baru didalam vs code jalankan perintah berikut untuk menjalankan tailwind css
```
npm run dev
```
