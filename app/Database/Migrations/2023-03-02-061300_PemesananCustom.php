<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemesananCustom extends Migration
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
            'pemesanan_id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'jenis_barang' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jumlah_pemesanan' => [
                'type' => 'INT',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
            'deleted_at datetime default null'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemesanan_custom');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan_custom');
    }
}
