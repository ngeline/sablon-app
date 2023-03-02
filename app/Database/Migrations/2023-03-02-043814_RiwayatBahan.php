<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RiwayatBahan extends Migration
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
            'bahan_id' => [
                'type' => 'BIGINT',
                'constraint' => '20'
            ],
            'kategori' => [
                'type' => 'ENUM',
                'constraint' => "'insert', 'update'",
            ],
            'pesan' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'detail_pesan' => [
                'type' => 'TEXT',
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => "'read', 'unread'",
                'null' => false,
                'default' => 'unread',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('riwayat_bahan');
    }

    public function down()
    {
        $this->forge->dropTable('riwayat_bahan');
    }
}
