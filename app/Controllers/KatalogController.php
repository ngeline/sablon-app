<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanModel;
use App\Models\KatalogBahanModel;
use App\Models\KatalogModel;

class KatalogController extends BaseController
{
    protected $katalog;
    protected $katalogBahan;
    protected $bahan;

    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session', 'text']);
        $this->katalog = new KatalogModel();
        $this->katalogBahan = new KatalogBahanModel();
        $this->bahan = new BahanModel();
    }

    private function myRules()
    {
        $myRules = [
            'nama' => [
                'label' => 'Nama Produk',
                'rules' => 'required'
            ],
            'foto' => [
                'label' => 'Foto Produk',
                'rules' => 'uploaded[foto]|max_size[foto,5120]|ext_in[foto,jpg,jpeg,png]'
            ],
            'bahan.*' => [
                'label' => 'Jenis Bahan',
                'rules' => 'required'
            ],
            'totalBahan' => [
                'label' => 'Total Harga Bahan',
                'rules' => 'required'
            ],
            'jual' => [
                'label' => 'Harga Jual Produk',
                'rules' => 'required|is_natural_no_zero'
            ],
            'deskripsi' => [
                'label' => 'Deskripsi Produk',
                'rules' => 'required'
            ]
        ];

        return $myRules;
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Katalog Produk',
            'list' => $this->katalog->getKatalogs(),
            'bahan' => $this->bahan->getBahans()
        ];

        return view('admin/katalog/index', $data);
    }

    public function store()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules($this->myRules());

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $arr = implode("<br>", $errors);
            session()->setFlashdata("warning", $arr);
            return redirect()->to(base_url('admin/kelola-katalog-produk'));
        }

        $file = $this->request->getFile('foto');
        $nameFile =  time() . '-' . $file->getName();
        $file->move(FCPATH . 'assets/image/katalog', $nameFile);

        $dataKatalog = [
            'nama_produk' => $data['nama'],
            'foto_produk' => $nameFile,
            'harga_bahan' => $data['totalBahan'],
            'harga_jual' => $data['jual'],
            'deskripsi' => $data['deskripsi'],
        ];

        $this->katalog->insertKatalog($dataKatalog);
        $katalogId = $this->katalog->getInsertID();

        foreach ($data['bahan'] as $value) {
            $dataKatalogBahan = [
                'katalog_id' => $katalogId,
                'bahan_id' => $value
            ];

            $this->katalogBahan->insertKatalogBahan($dataKatalogBahan);
        }

        session()->setFlashdata("success", 'Berhasil menambahkan data!');
        return redirect()->to(base_url('admin/kelola-katalog-produk'));
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $dataKatalogBahan = $this->katalogBahan->select('bahan.nama_bahan')
                ->join('bahan', 'katalog_bahan.bahan_id = bahan.id')
                ->where('katalog_bahan.katalog_id', $id)
                ->where('katalog_bahan.deleted_at', null)
                ->withDeleted('bahan')
                ->get()->getResultArray();

            $arr = [];

            foreach ($dataKatalogBahan as $value) {
                array_push($arr, $value['nama_bahan']);
            }

            $data = [
                'katalog' => $this->katalog->getKatalog($id),
                'bahan' => implode(", ", $arr)
            ];

            $encoded_data = base64_encode(json_encode($data));

            return $this->response->setContentType('application/json')
                ->setJSON(array('data' => $encoded_data));
        }
    }

    public function update()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();

        // Define file
        $file = $this->request->getFile('foto');

        $arrRules = $this->myRules();

        // Condition if file valid
        if (!$file->isValid()) {
            unset($arrRules['foto']);
        }

        // Condition if bahan dan totalBahan kosong
        if (empty($data['bahan']) || empty($data['totalBahan'])) {
            unset($arrRules['bahan.*']);
            unset($arrRules['totalBahan']);
        }

        $validation->setRules($arrRules);

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $arr = implode("<br>", $errors);
            session()->setFlashdata("warning", $arr);
            return redirect()->to(base_url('admin/kelola-katalog-produk'));
        }

        // Data Insert
        $dataKatalog = [
            'nama_produk' => $data['nama'],
            'harga_jual' => $data['jual'],
            'deskripsi' => $data['deskripsi'],
        ];

        // Condition if file valid
        if ($file->isValid() && !$file->hasMoved()) {
            $nameFile =  time() . '-' . $file->getName();
            $file->move(FCPATH . 'assets/image/katalog', $nameFile);

            $dataKatalog["foto_produk"] = $nameFile;
        }

        // Condition if totalBahan tidak kosong
        if (!empty($data['totalBahan'])) {
            $dataKatalog['harga_bahan'] = $data['totalBahan'];
        }

        // Condition if bahan tidak kosong
        if (!empty($data['bahan'])) {
            $this->katalogBahan->where('katalog_id', $data['id'])->delete();

            foreach ($data['bahan'] as $value) {
                $dataKatalogBahan = [
                    'katalog_id' =>  $data['id'],
                    'bahan_id' => $value
                ];

                $this->katalogBahan->insertKatalogBahan($dataKatalogBahan);
            }
        }

        $this->katalog->updateKatalog($dataKatalog, $data['id']);

        session()->setFlashdata("success", 'Berhasil memperbarui data!');
        return redirect()->to(base_url('admin/kelola-katalog-produk'));
    }

    public function delete($id)
    {
        $this->katalog->deleteKatalog($id);

        session()->setFlashdata("success", 'Record berhasil dihapus!');
        return redirect()->to(base_url('admin/kelola-katalog-produk'));
    }
}
