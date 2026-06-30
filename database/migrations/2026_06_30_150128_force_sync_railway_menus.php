<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Wipe existing menus
        DB::table('menus')->truncate();

        // Insert local data so Railway database matches exactly
        $menus = [
            ["id"=>6,"id_menu"=>"Menu01","gambar"=>"menus/IIbqELvLDylpAs3QAALLsvq7ohEVrkvWSXWiPLVu.png","nama_menu"=>"Nasi goreng spesial + Telor","kategori"=>"Makanan Utama","harga"=>"25.00","deskripsi"=>"Hidangan spesiap nasi goreng","created_at"=>"2026-06-30 08:45:57","updated_at"=>"2026-06-30 08:45:57"],
            ["id"=>7,"id_menu"=>"Menu002","gambar"=>"menus/EVfnaSViR2TtpqEP9Of6MvcxImpAOzhNNsSl7Vr4.png","nama_menu"=>"Ayam bakar madu","kategori"=>"Makanan Utama","harga"=>"27.00","deskripsi"=>"Ayam bakar hidangan lezat","created_at"=>"2026-06-30 08:50:31","updated_at"=>"2026-06-30 08:50:31"],
            ["id"=>8,"id_menu"=>"Menu003","gambar"=>"menus/rtWHdHiyyNp1ApWeaLiEF9HZI6ktn68r5E3MecAr.png","nama_menu"=>"Jus alpukat","kategori"=>"Minuman","harga"=>"15.00","deskripsi"=>"Segar cocok untuk minuman diet","created_at"=>"2026-06-30 08:51:17","updated_at"=>"2026-06-30 08:51:17"],
            ["id"=>9,"id_menu"=>"Menu0044","gambar"=>"menus/dnEFgCByOI0uIbqn16G1vPKtuajm67sZzSWFBQ2w.png","nama_menu"=>"Pancake susu stroberry","kategori"=>"Dessert","harga"=>"200000.00","deskripsi"=>"Manis dan lembut","created_at"=>"2026-06-30 08:52:21","updated_at"=>"2026-06-30 08:58:24"],
            ["id"=>12,"id_menu"=>"menu007","gambar"=>"menus/UeYhSzCdvWpqQk9RpaoP1Q3HPtfplqnIBPqWfIpX.png","nama_menu"=>"Ice matcha spesial","kategori"=>"Minuman","harga"=>"23000.00","deskripsi"=>"matcha jepang","created_at"=>"2026-06-30 08:59:08","updated_at"=>"2026-06-30 08:59:08"]
        ];

        DB::table('menus')->insert($menus);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
