<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $recipes = [
            [
                'name' => 'Classic Chocolate Cake',
                'category' => 'Cake',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1ea381?w=500&q=80',
                'time' => '90 menit',
                'difficulty' => 'Sedang',
                'description' => 'Kue cokelat klasik yang super lembut, basah (moist), dan nyoklat banget. Cocok untuk acara ulang tahun atau kumpul keluarga.',
                'ingredients' => ['200g Tepung Terigu', '50g Cokelat Bubuk', '200g Gula Pasir', '2 butir Telur', '120ml Susu Cair', '100g Mentega Cair'],
                'tools' => ['Mixer', 'Loyang 20cm', 'Oven', 'Spatula'],
                'steps' => ['Campur semua bahan kering (tepung, cokelat bubuk, gula) di satu wadah.', 'Masukkan telur, susu, dan mentega. Aduk rata menggunakan mixer kecepatan rendah.', 'Tuang adonan ke loyang yang sudah diolesi mentega.', 'Panggang di oven suhu 180°C selama 45 menit.', 'Keluarkan, dinginkan, lalu hias sesuai selera.']
            ],
            [
                'name' => 'Nastar Keju Lumer',
                'category' => 'Cookies',
                'image' => 'https://images.unsplash.com/photo-1601314959194-e3549fb1b4f4?w=500&q=80',
                'time' => '120 menit',
                'difficulty' => 'Sulit',
                'description' => 'Kue kering nastar klasik dengan isian selai nanas asli dan taburan keju gurih yang lumer di mulut.',
                'ingredients' => ['250g Mentega', '50g Gula Halus', '2 Kuning Telur', '350g Tepung Terigu', 'Selai Nanas secukupnya', 'Keju Cheddar Parut'],
                'tools' => ['Mixer', 'Loyang Kue Kering', 'Kuas Nastar', 'Oven'],
                'steps' => ['Kocok mentega dan gula halus hingga lembut, masukkan kuning telur.', 'Tambahkan tepung terigu perlahan sambil diaduk dengan spatula.', 'Ambil sedikit adonan, pipihkan, isi selai nanas, bentuk bulat.', 'Tata di loyang, olesi kuning telur, taburi keju.', 'Panggang suhu 150°C selama 30 menit.']
            ],
            [
                'name' => 'Matcha Mille Crepes',
                'category' => 'Dessert',
                'image' => 'https://images.unsplash.com/photo-1563223772-23c3b0ebf49c?w=500&q=80',
                'time' => '60 menit',
                'difficulty' => 'Menantang',
                'description' => 'Kue berlapis-lapis tipis dengan krim matcha yang lembut. Tanpa oven, cukup pakai teflon!',
                'ingredients' => ['150g Tepung Terigu', '2 sdm Bubuk Matcha', '3 butir Telur', '400ml Susu Cair', '50g Mentega Cair', 'Whipping Cream cair (untuk olesan)'],
                'tools' => ['Teflon anti lengket', 'Whisk', 'Mangkuk besar', 'Spatula Kue'],
                'steps' => ['Campur tepung, matcha, telur, dan susu. Aduk rata hingga tidak bergerindil.', 'Saring adonan, lalu masukkan mentega cair.', 'Dadar tipis-tipis adonan di atas teflon hingga habis.', 'Kocok whipping cream hingga kaku.', 'Tumpuk selembar crepe, olesi krim, tumpuk lagi. Lakukan sampai habis. Dinginkan.']
            ],
            [
                'name' => 'Fudgy Brownies',
                'category' => 'Brownies',
                'image' => 'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=500&q=80',
                'time' => '45 menit',
                'difficulty' => 'Mudah',
                'description' => 'Brownies panggang dengan tekstur padat, kenyal di dalam, dan permukaan "shiny crust" yang cantik.',
                'ingredients' => ['150g Dark Chocolate', '50g Mentega', '40ml Minyak Goreng', '2 butir Telur', '150g Gula Halus', '100g Tepung Terigu', '30g Cokelat Bubuk'],
                'tools' => ['Panci (untuk tim cokelat)', 'Whisk', 'Loyang 20x20cm', 'Oven'],
                'steps' => ['Lelehkan dark chocolate, mentega, dan minyak. Sisihkan.', 'Kocok telur dan gula halus dengan whisk sampai gula benar-benar larut.', 'Masukkan lelehan cokelat ke kocokan telur, aduk rata.', 'Masukkan tepung dan cokelat bubuk sambil diayak. Aduk balik pelan.', 'Tuang ke loyang, panggang suhu 180°C selama 30 menit.']
            ],
            [
                'name' => 'Strawberry Shortcake',
                'category' => 'Cake',
                'image' => 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=500&q=80',
                'time' => '75 menit',
                'difficulty' => 'Sedang',
                'description' => 'Kue sponge vanilla super ringan dipadukan dengan whipped cream segar dan potongan stroberi asli.',
                'ingredients' => ['4 butir Telur', '100g Gula Pasir', '100g Tepung Terigu', '30g Mentega Cair', '300ml Whipping Cream', 'Buah Stroberi segar'],
                'tools' => ['Mixer', 'Loyang bulat 18cm', 'Oven', 'Pisau Roti'],
                'steps' => ['Kocok telur dan gula hingga putih berjejak (mengembang kaku).', 'Masukkan tepung terigu perlahan, aduk balik pakai spatula.', 'Masukkan mentega cair, aduk rata, panggang suhu 170°C selama 25 menit.', 'Setelah kue dingin, belah dua melintang.', 'Olesi whipped cream, tata stroberi, tumpuk dengan kue lagi, dan hias luarnya.']
            ]
        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }
}