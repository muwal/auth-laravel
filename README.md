## Cara Install Project

- Install dan setup Laravel versi 8.x dan PHP versi 8.2.4 [documentation](https://laravel.com/docs/8.x/installation)
- Membuat database menggunakan MySQL dengan nama 'sagara-app' atau dengan referensi masing-masing, **jika menggunakan metode ini Anda harus merubah config database di file .env**
- Migrasi table yang sudah tersedia di folder **app/database/migrations. [documentation](https://laravel.com/docs/8.x/migrations)
- Jalankan command di terminal **composer update dan npm install**
- Jalankan project Anda dengan command **php artisan serve**. [documentation](https://laravel.com/docs/8.x/artisan)

## Manual User Documentation

- Daftarkan akun Anda di halaman Sign Up, dan verifikasi email dengan cara konfirmasi kepada saya. Karena untuk saat ini masih menggunakan verifikasi email melalui mailtrap.
- **WARNING** Sesuaikan kembali endpoint verifikasi email dengan URL Anda dengan cara atur host ke **:[8000] atau :[8001]**.
- Jika akun Anda sudah terverifikasi, Anda sudah mempunyai akses untuk halaman Dashboard dan Contact.
- Di halaman Contact, Anda bisa menambahkan, merubah, dan menghapus data Contact.
