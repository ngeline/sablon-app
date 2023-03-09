<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Katalog extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_produk' => 'Kaos Trend Motif Perang',
                'foto_produk' => 'kaos1.jpg',
                'harga_bahan' => '45000',
                'harga_jual' => '55000',
                'deskripsi' => '<b>Kaos Trend Nih Boz</b>'
            ],
            [
                'nama_produk' => 'Kaos DTG Motif Anime',
                'foto_produk' => 'kaos2.jpg',
                'harga_bahan' => '50000',
                'harga_jual' => '60000',
                'deskripsi' => '<b>Kaos Anime Nih Boz</b>'
            ],
            [
                'nama_produk' => 'Kaos Discharge Motif Geometri',
                'foto_produk' => 'kaos3.jpg',
                'harga_bahan' => '43000',
                'harga_jual' => '53000',
                'deskripsi' => '<b>Kaos Mengkotak Nih Boz</b>'
            ],
        ];

        $this->db->table('katalog')->insertBatch($data);

        $katalogBahan = [
            [
                'katalog_id' => '1',
                'bahan_id' => '1',
            ],
            [
                'katalog_id' => '1',
                'bahan_id' => '4',
            ],
            [
                'katalog_id' => '2',
                'bahan_id' => '2',
            ],
            [
                'katalog_id' => '2',
                'bahan_id' => '5',
            ],
            [
                'katalog_id' => '3',
                'bahan_id' => '3',
            ],
            [
                'katalog_id' => '3',
                'bahan_id' => '6',
            ],
        ];

        $this->db->table('katalog_bahan')->insertBatch($katalogBahan);
    }
}
