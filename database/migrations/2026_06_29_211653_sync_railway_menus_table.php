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
        \Illuminate\Support\Facades\DB::table('menus')->truncate();
        
        \Illuminate\Support\Facades\DB::table('menus')->insert([
            'id' => 6,
            'id_menu' => 'MNU001',
            'gambar' => 'menus/iOs7BkIitmVJzc7PKdl8MeTOCnVQixL8m4iw4CT5.png',
            'nama_menu' => 'Nasi goreng spesial telor',
            'kategori' => 'Makanan Utama Pagi',
            'harga' => '25000.00',
            'deskripsi' => 'nasi goreng spesial + telor',
            'created_at' => '2026-06-29 21:00:20',
            'updated_at' => '2026-06-29 21:00:20'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
