<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert(
            [
                [
                    'id_kategori'=> '1',
                    'kategori_barang'=>'Pakan Kucing',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_kategori'=> '2',
                    'kategori_barang'=>'Pakan Burung',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_kategori'=> '3',
                    'kategori_barang'=>'Pakan Ikan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_kategori'=> '4',
                    'kategori_barang' => 'Aksesoris Hewan',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
