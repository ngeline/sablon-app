<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => password_hash('12345678', PASSWORD_DEFAULT)
            ],
            [
                'username' => 'pemilik',
                'role' => 'pemilik',
                'password' => password_hash('12345678', PASSWORD_DEFAULT)
            ]
        ];

        $this->db->table('users')->insertBatch($user);
    }
}
