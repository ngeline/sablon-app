<?php

namespace App\Models;

use CodeIgniter\Model;

class PemesananCustomBahanModel extends Model
{
    protected $allowedFields;
    public function __construct()
    {
        parent::__construct();
        // Get all the field names from the table
        $fields = $this->db->getFieldNames('pemesanan_custom_bahan');

        // Build the allowedFields array
        foreach ($fields as $field) {
            if ($field != 'id') {
                $this->allowedFields[] = $field;
            }
        }
    }

    protected $table            = 'pemesanan_custom_bahan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;

    // Dates
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getPemesananCustomBahan($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getPemesananCustomBahans()
    {
        return $this->findAll();
    }

    public function insertPemesananCustomBahan($data)
    {
        return $this->save($data);
    }

    public function updatePemesananCustomBahan($data, $id)
    {
        return $this->update($id, $data);
    }

    public function deletePemesananCustomBahan($id)
    {
        return $this->delete($id);
    }
}
