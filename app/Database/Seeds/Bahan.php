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
                'nama_bahan' => 'Sablon DTG',
                'foto_bahan' => 'dtg.jpg',
                'kualitas' => 'premium',
                'jenis' => 'sablon',
                'harga_beli' => '15000',
                'harga_jual' => '22000',
                'capital_gain' => '7000',
                'keterangan' => 'Jenis sablon dtg dengan kualitas premium'
            ],
            [
                'nama_bahan' => 'Sablon Discharge',
                'foto_bahan' => 'discharge.jpg',
                'kualitas' => 'medium',
                'jenis' => 'sablon',
                'harga_beli' => '10000',
                'harga_jual' => '15000',
                'capital_gain' => '5000',
                'keterangan' => 'Jenis sablon discharge dengan kualitas medium'
            ],
            [
                'nama_bahan' => 'Kaos Cotton Combed',
                'foto_bahan' => 'polo.jpg',
                'kualitas' => 'premium',
                'jenis' => 'kaos',
                'harga_beli' => '15000',
                'harga_jual' => '30000',
                'capital_gain' => '15000',
                'keterangan' => 'Jenis kaos cotton combed dengan kualitas premium'
            ],
            [
                'nama_bahan' => 'Kaos Polyester',
                'foto_bahan' => 'polyester.png',
                'kualitas' => 'premium',
                'jenis' => 'kaos',
                'harga_beli' => '18000',
                'harga_jual' => '28000',
                'capital_gain' => '10000',
                'keterangan' => 'Jenis kaos polyester dengan kualitas premium'
            ],
            [
                'nama_bahan' => 'Kaos Hyget',
                'foto_bahan' => 'hyget.jpg',
                'kualitas' => 'medium',
                'jenis' => 'kaos',
                'harga_beli' => '18000',
                'harga_jual' => '28000',
                'capital_gain' => '10000',
                'keterangan' => 'Jenis kaos hyget dengan kualitas medium'
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
                'pesan' => 'Menambahkan bahan Sablon DTG dengan harga 22000',
                'detail_pesan' => 'Bahan baru Sablon DTG dengan harga beli 15000 dan dijual dengan harga 22000',
            ],
            [
                'bahan_id' => '3',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Sablon Discharge dengan harga 15000',
                'detail_pesan' => 'Bahan baru Sablon Discharge dengan harga beli 10000 dan dijual dengan harga 15000',
            ],
            [
                'bahan_id' => '4',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Kaos Cotton Combed dengan harga 30000',
                'detail_pesan' => 'Bahan baru Kaos Cotton Combed dengan harga beli 15000 dan dijual dengan harga 30000',
            ],
            [
                'bahan_id' => '5',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Kaos Polyester dengan harga 28000',
                'detail_pesan' => 'Bahan baru Kaos Polyester dengan harga beli 18000 dan dijual dengan harga 28000',
            ],
            [
                'bahan_id' => '6',
                'kategori' => 'insert',
                'pesan' => 'Menambahkan bahan Kaos Hyget dengan harga 28000',
                'detail_pesan' => 'Bahan baru Kaos Hyget dengan harga beli 18000 dan dijual dengan harga 28000',
            ],
        ];

        $this->db->table('riwayat_bahan')->insertBatch($riwayat);
    }
}
