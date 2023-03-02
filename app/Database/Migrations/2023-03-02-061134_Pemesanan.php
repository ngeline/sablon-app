<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pemesanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'kode_resi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_pemesan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'ktp_pemesan' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'telepon_pemesan' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'alamat_pemesan' => [
                'type' => 'TEXT',
            ],
            'alamat_pengiriman' => [
                'type' => 'TEXT',
            ],
            'tanggal_pemesanan' => [
                'type' => 'DATE',
            ],
            'jumlah_pemesanan' => [
                'type' => 'INT',
            ],
            'jenis_pemesanan' => [
                'type' => 'ENUM',
                'constraint' => "'normal', 'custom'",
            ],
            'jenis_pelunasan' => [
                'type' => 'ENUM',
                'constraint' => "'dp', 'lunas'",
                'null' => true
            ],
            'jenis_pembayaran' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true
            ],
            'total_bahan' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'total_jasa' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'total_biaya_custom' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'null' => true
            ],
            'total_pembayaran' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'total_terbayar' => [
                'type' => 'BIGINT',
                'constraint' => '20',
                'null' => true
            ],
            'foto_bukti_pembayaran' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'status_pemesanan_admin' => [
                'type' => 'ENUM',
                'constraint' => "'diproses', 'diterima', 'dibatalkan'",
                'null' => false,
                'default' => 'diproses'
            ],
            'status_pembayaran_admin' => [
                'type' => 'ENUM',
                'constraint' => "'diproses', 'diterima', 'dibatalkan'",
                'null' => false,
                'default' => 'diproses'
            ],
            'validasi_admin_id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemesanan');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan');
    }
}
