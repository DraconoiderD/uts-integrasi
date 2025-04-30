<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    // GET all menus
    public function index()
    {
        $menus = Menu::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar menu berhasil diambil',
            'data' => $menus
        ], 200);
    }

    // GET a specific menu
    public function show($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail menu ditemukan',
            'data' => $menu
        ], 200);
    }

    // POST - Create a new menu
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer|min:0',  // Stok tidak boleh negatif
            'category' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => true,  // Ini tetap sukses meski gagal
                'message' => 'Menu gagal ditambahkan',
                'data' => [
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'stock' => $request->input('stock'),
                    'category' => $request->input('category')
                ]
            ], 422);  // Menggunakan HTTP status 422 (Unprocessable Entity)
        }

        $menu = Menu::create($validator->validated());

        return response()->json([
            'success' => true,
            'message' => 'Menu berhasil ditambahkan',
            'data' => $menu
        ], 201);
    }

    // PUT - Update a menu
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        try {
            // Hanya kolom yang boleh diubah
            $menu->update($request->only(['name', 'price', 'stock', 'category']));

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil diperbarui',
                'data' => $menu
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // DELETE - Delete a menu
    public function destroy($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return response()->json([
                'success' => false,
                'message' => 'Menu tidak ditemukan'
            ], 404);
        }

        try {
            $menu->delete();

            return response()->json([
                'success' => true,
                'message' => 'Menu berhasil dihapus'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus menu',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
