<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{

    protected $allowedFields;
    public function __construct()
    {
        parent::__construct();
        // Get all the field names from the table
        $fields = $this->db->getFieldNames('users');

        // Build the allowedFields array
        foreach ($fields as $field) {
            if ($field != 'id') {
                $this->allowedFields[] = $field;
            }
        }
    }

    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;


    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUser($id)
    {
        return $this->where(['id' => $id])->first();
    }
    public function getUsers()
    {
        return $this->findAll();
    }
    public function insertUser($data)
    {
        return $this->db->table('users')->insert($data);
    }
    public function updateUser($data, $id)
    {
        return $this->update($id, $data);
    }
    public function deleteUser($id)
    {
        return $this->delete($id);
    }
}
