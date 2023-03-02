<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KatalogBahan extends Migration
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
            'katalog_id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'bahan_id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('katalog_bahan');
    }

    public function down()
    {
        $this->forge->dropTable('katalog_bahan');
    }
}
