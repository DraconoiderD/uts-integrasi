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

🚀 Cara Menjalankan API

Clone repo dan jalankan:

composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve --port=8001

Jalankan server MySQL dan pastikan .env sesuai.

📮 Contoh Request

POST /api/menus

{
  "name": "Nasi Goreng",
  "price": 20000,
  "stock": 10,
  "category": "Makanan Utama"
}

POST /api/orders

{
  "user_id": 1,
  "menu_id": 2,
  "quantity": 3,
  "status": "pending"
}

📌 Catatan

Gunakan ID yang valid untuk user_id dan menu_id

Semua endpoint menerima dan mengembalikan JSON

