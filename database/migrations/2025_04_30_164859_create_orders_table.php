<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Buat tabel menus terlebih dahulu
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); // Unsigned BigInt
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->string('category')->nullable();
            $table->timestamps();
        });

        // Buat tabel users (stub sederhana jika belum ada)
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id(); // Unsigned BigInt
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->timestamps();
            });
        }

        // Baru buat tabel orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('users'); // Hapus hanya jika kamu buat dalam file ini
    }
};
