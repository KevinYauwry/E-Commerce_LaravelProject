<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('produks')->insert([
            ['nama' => 'Air Conditioner', 'harga' => 4000000, 'gambar' => 'images/ac.jpg'],
            ['nama' => 'Kulkas 2 Pintu', 'harga' => 10000000, 'gambar' => 'images/kulkas.jpeg'],
            ['nama' => 'Kompor Listrik', 'harga' => 499999, 'gambar' => 'images/kompor.jpg'],
            ['nama' => 'Rice Cooker', 'harga' => 699999, 'gambar' => 'images/rice.jpeg'],
            ['nama' => 'Mesin Cuci', 'harga' => 4599999, 'gambar' => 'images/cuci.jpg'],
            ['nama' => 'Vacuum Cleaner', 'harga' => 829999, 'gambar' => 'images/vacuum.jpg'],
            ['nama' => 'Air Purifier', 'harga' => 1699999, 'gambar' => 'images/air.jpg'],
            ['nama' => 'Microwave', 'harga' => 1959999, 'gambar' => 'images/microwave.jpg'],
            ['nama' => 'Kipas Angin', 'harga' => 299999, 'gambar' => 'images/kipas.jpg'],
            ['nama' => 'Blender', 'harga' => 569999, 'gambar' => 'images/blender.jpg'],
        ]);
    }
}
