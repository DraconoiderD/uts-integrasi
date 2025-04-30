# 🍽️ Sistem Pemesanan Makanan Online – REST API

Sistem ini terdiri dari 3 layanan utama: **UserService**, **MenuService**, dan **OrderService**. Masing-masing menyediakan endpoint CRUD yang bisa diakses melalui Postman.

---

## 📦 Struktur Layanan

### 1. 👤 UserService
- **Provider** data user (nama, alamat, email, dll)
- **Consumer** riwayat transaksi dari OrderService

📂 Dokumentasi: [UserService Postman Collection](https://postman.co/workspace/My-Workspace~ebdeb74a-c0df-4cd6-82d0-8ee17f00e0a4/folder/35046068-3fdb7f75-0c61-46ee-ba75-03c6e11205e7)

---

### 2. 🍔 MenuService
- **Provider** data menu makanan (nama, harga, stok, kategori)
- **Consumer** data pengguna (preferensi makanan)

📂 Dokumentasi: [MenuService Postman Collection](https://postman.co/workspace/My-Workspace~ebdeb74a-c0df-4cd6-82d0-8ee17f00e0a4/folder/35046068-cb9a7900-592b-4b00-987f-b87f5fce0f5c)

---

### 3. 🛒 OrderService
- **Consumer** dari UserService dan MenuService
- **Provider** data transaksi dan riwayat pemesanan

📂 Dokumentasi: [OrderService Postman Collection](https://postman.co/workspace/My-Workspace~ebdeb74a-c0df-4cd6-82d0-8ee17f00e0a4/folder/35046068-c33473fa-7a74-4e17-af33-91789b833a39)

---

## 🚀 Cara Menjalankan API

1. Clone repo dan jalankan:
   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   php artisan serve --port=8001
   ```

2. Jalankan server MySQL dan pastikan `.env` sesuai.

---

## 📮 Contoh Request

### POST `/api/menus`
```json
{
  "name": "Nasi Goreng",
  "price": 20000,
  "stock": 10,
  "category": "Makanan Utama"
}
```

### POST `/api/orders`
```json
{
  "user_id": 1,
  "menu_id": 2,
  "quantity": 3,
  "status": "pending"
}
```

---

## 📌 Catatan
- Gunakan ID yang valid untuk `user_id` dan `menu_id`
- Semua endpoint menerima dan mengembalikan JSON

