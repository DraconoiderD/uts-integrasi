🍽️ Sistem Pemesanan Makanan Online – REST API

Sistem ini terdiri dari 3 layanan utama: UserService, MenuService, dan OrderService. Masing-masing menyediakan endpoint CRUD yang bisa diakses melalui Postman.

📦 Struktur Layanan

1. 👤 UserService

Provider data user (nama, alamat, email, dll)

Consumer riwayat transaksi dari OrderService

📂 Dokumentasi: UserService Postman Collection

2. 🍔 MenuService

Provider data menu makanan (nama, harga, stok, kategori)

Consumer data pengguna (preferensi makanan)

📂 Dokumentasi: MenuService Postman Collection

3. 🛒 OrderService

Consumer dari UserService dan MenuService

Provider data transaksi dan riwayat pemesanan

📂 Dokumentasi: OrderService Postman Collection

