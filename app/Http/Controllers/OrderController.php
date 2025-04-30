<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    // GET all orders
    public function index()
    {
        $orders = Order::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar pesanan berhasil diambil',
            'data' => $orders
        ]);
    }

    // GET order by ID
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail pesanan ditemukan',
            'data' => $order
        ]);
    }

    // POST - Create new order
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'menu_id' => 'required|exists:menus,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $order = Order::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dibuat',
            'data' => $order
        ], 201);
    }

    // PUT - Update order
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'exists:users,id',
            'menu_id' => 'exists:menus,id',
            'quantity' => 'integer|min:1',
            'status' => 'string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $order->update($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil diperbarui',
            'data' => $order
        ]);
    }

    // DELETE - Delete order
    public function destroy($id)
    {
        $order = Order::find($id);
        if (!$order) {
            return response()->json([
                'success' => false,
                'message' => 'Pesanan tidak ditemukan'
            ], 404);
        }

        $order->delete();

        return response()->json([
            'success' => true,
            'message' => 'Pesanan berhasil dihapus'
        ]);
    }
}
