<?php
namespace Database\Seeders;
use App\Models\Menu;
use Illuminate\Database\Seeder;
class MenuSeeder extends Seeder
{
    public function run(): void
    {
        $menus = [
            [
                'id_menu' => 'MNU001',
                'gambar' => 'images/jus-alpukat.png',
                'nama_menu' => 'Jus Alpukat',
                'kategori' => 'Minuman',
                'harga' => 18000,
                'deskripsi' => 'Jus alpukat segar dengan campuran susu coklat dan gula aren. Dibuat dari alpukat matang pilihan yang creamy dan lezat. Minuman yang menyegarkan dan mengenyangkan.',
            ],
            [
                'id_menu' => 'MNU002',
                'gambar' => 'images/rendang.png',
                'nama_menu' => 'Rendang Daging Sapi',
                'kategori' => 'Makanan Utama',
                'harga' => 55000,
                'deskripsi' => 'Rendang daging sapi empuk yang dimasak dengan santan kelapa dan rempah-rempah pilihan selama berjam-jam hingga bumbu meresap sempurna. Hidangan tradisional Minangkabau yang kaya akan cita rasa.',
            ],
            [
                'id_menu' => 'MNU003',
                'gambar' => 'images/ayam-bakar.png',
                'nama_menu' => 'Ayam Bakar Madu',
                'kategori' => 'Makanan Utama',
                'harga' => 45000,
                'deskripsi' => 'Ayam bakar dengan olesan madu pilihan dan bumbu rempah tradisional. Dibakar sempurna dengan aroma yang menggugah selera. Disajikan dengan nasi putih hangat, lalapan segar, dan sambal terasi.',
            ],
            [
                'id_menu' => 'MNU004',
                'gambar' => 'images/sop-iga.png',
                'nama_menu' => 'Sop Iga Sapi',
                'kategori' => 'Makanan Utama',
                'harga' => 65000,
                'deskripsi' => 'Sop iga sapi dengan kuah bening yang gurih dan segar. Iga sapi empuk yang dimasak perlahan bersama wortel, kentang, tomat, dan daun bawang. Disajikan hangat dengan nasi putih.',
            ],
            [
                'id_menu' => 'MNU005',
                'gambar' => 'images/sate-ayam.png',
                'nama_menu' => 'Sate Ayam Madura',
                'kategori' => 'Makanan Utama',
                'harga' => 30000,
                'deskripsi' => 'Sate ayam khas Madura dengan bumbu kacang yang gurih dan lontong. Daging ayam pilihan yang empuk dan juicy, dibakar dengan arang untuk menghasilkan aroma smoky yang khas. Porsi 10 tusuk.',
            ],
        ];
        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
