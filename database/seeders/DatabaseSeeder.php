<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $dataBarang = [
            [

                'nama_barang' => 'Pencil',
                'harga' => '2000',
                'kode_barang' => 'BRG-01',

            ],
            [

                'nama_barang' => 'Pulpen',
                'harga' => '3000',
                'kode_barang' => 'BRG-02',
            ],
            [

                'nama_barang' => 'Penghapus',
                'harga' => '1000',
                'kode_barang' => 'BRG-03',
            ],
        ];
        $dataPelanggan = [
            [
                'nama_pelanggan' => 'Joko',
                'usia' => '20',
                'no_hp' => '0812332123',
            ],
            [
                'nama_pelanggan' => 'Aguss',
                'usia' => '10',
                'no_hp' => '08123232',
            ], [
                'nama_pelanggan' => 'Fikry',
                'usia' => '23',
                'no_hp' => '08123223232',
            ]
        ];
        foreach ($dataBarang as $b) {
            \App\Models\Barang::create($b);
        }

        foreach ($dataPelanggan as $p) {
            \App\Models\Pelanggan::create($p);
        }
    }
}
