<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Bahan extends Migration
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
            'nama_bahan' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'kualitas' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'jenis' => [
                'type' => 'VARCHAR',
                'constraint' => 100
            ],
            'harga_beli' => [
                'type' => 'BIGINT',
                'constraint' => '20'
            ],
            'harga_jual' => [
                'type' => 'BIGINT',
                'constraint' => '20'
            ],
            'capital_gain' => [
                'type' => 'BIGINT',
                'constraint' => '20'
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bahan');
    }

    public function down()
    {
        $this->forge->dropTable('bahan');
    }
}
