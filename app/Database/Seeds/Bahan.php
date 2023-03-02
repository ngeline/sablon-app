<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Bahan extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_bahan' => 'Sablon Rubber',
                'foto_bahan' => 'rubber.jpg',
                'kualitas' => 'medium',
                'jenis' => 'sablon',
                'harga_beli' => '8000',
                'harga_jual' => '15000',
                'capital_gain' => '7000',
                'keterangan' => 'Jenis sablon rubber dengan kualitas medium'
            ],
            [
                'nama_bahan' => 'Kaos Polo Catun',
                'foto_bahan' => 'polo.jpg',
                'kualitas' => 'premium',
                'jenis' => 'kaos',
                'harga_beli' => '15000',
                'harga_jual' => '30000',
                'capital_gain' => '15000',
                'keterangan' => 'Jenis kaos polo dengan kualitas premium'
            ],
        ];

        $this->db->table('bahan')->insertBatch($data);

        $riwayat = [
            [
                'bahan_id' => '1',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Sablon Rubber dengan harga 15000',
                'detail_pesan' => 'Bahan baru Sablon Rubber dengan harga beli 8000 dan dijual dengan harga 15000',
            ],
            [
                'bahan_id' => '2',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Kaos Polo Catun dengan harga 30000',
                'detail_pesan' => 'Bahan baru Kaos Polo Catun dengan harga beli 15000 dan dijual dengan harga 30000',
            ]
        ];

        $this->db->table('riwayat_bahan')->insertBatch($riwayat);
    }
}
