<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PemesananCustomFoto extends Migration
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
            'pemesanan_custom_id' => [
                'type' => 'BIGINT',
                'constraint' => '20',
            ],
            'foto' => [
                'type' => 'TEXT',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pemesanan_custom_foto');
    }

    public function down()
    {
        $this->forge->dropTable('pemesanan_custom_foto');
    }
}
