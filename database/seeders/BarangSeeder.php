<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert(
            [
                [
                    'id_barang'=> 'A01',
                    'nama_barang'=>'Konsentrat Sapi Nutrifeed',
                    'id_kategori'=> '2',
                    'stok' => 100,
                    'satuan' => 'Kilogram',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'id_barang'=> 'A02',
                    'nama_barang'=>'Harnes',
                    'id_kategori'=> '4',
                    'stok' => 50,
                    'satuan' => 'Pcs',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
