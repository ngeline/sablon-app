<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Katalog extends Migration
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
            'nama_produk' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'foto_produk' => [
                'type' => 'TEXT',
            ],
            'harga_bahan' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'harga_jual' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('katalog');
    }

    public function down()
    {
        $this->forge->dropTable('katalog');
    }
}
