<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanModel;
use App\Models\RiwayatBahanModel;

class BahanController extends BaseController
{
    protected $bahan;
    protected $riwayatBahan;

    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session', 'text']);
        $this->bahan = new BahanModel();
        $this->riwayatBahan = new RiwayatBahanModel();
    }

    private function myRules()
    {
        $myRules = [
            'nama' => [
                'label' => 'Nama Bahan',
                'rules' => 'required'
            ],
            'foto' => [
                'label' => 'Foto Bahan',
                'rules' => 'uploaded[foto]|max_size[foto,5120]|ext_in[foto,jpg,jpeg,png]'
            ],
            'kualitas' => [
                'label' => 'Kualitas Bahan',
                'rules' => 'required'
            ],
            'jenis' => [
                'label' => 'Jenis Bahan',
                'rules' => 'required'
            ],
            'beli' => [
                'label' => 'Harga Beli Bahan',
                'rules' => 'required|is_natural_no_zero'
            ],
            'jual' => [
                'label' => 'Harga Jual Bahan',
                'rules' => 'required|is_natural_no_zero'
            ],
            'keterangan' => [
                'label' => 'Keterangan Bahan',
                'rules' => 'required'
            ]
        ];

        return $myRules;
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Bahan',
            'list' => $this->bahan->getBahans(),
            'kualitas' => $this->bahan->select('kualitas')->groupBy('kualitas')->orderBy('kualitas', 'asc')->findAll(),
            'jenis' => $this->bahan->select('jenis')->groupBy('jenis')->orderBy('jenis', 'asc')->findAll(),
        ];

        return view('pemilik/bahan/index', $data);
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
            return redirect()->to(base_url('pemilik/kelola-bahan'));
        }

        $file = $this->request->getFile('foto');
        $nameFile =  time() . '-' . $file->getName();
        $file->move(FCPATH . 'assets/image/bahan', $nameFile);

        $capitalGain = ($data['jual'] - $data['beli']);

        $bahan = [
            'nama_bahan' => $data['nama'],
            'foto_bahan' => $nameFile,
            'kualitas' => strtolower($data['kualitas']),
            'jenis' => strtolower($data['jenis']),
            'harga_beli' => $data['beli'],
            'harga_jual' => $data['jual'],
            'capital_gain' => $capitalGain,
            'keterangan' => $data['keterangan'],
        ];

        $this->bahan->insertBahan($bahan);
        $bahanId = $this->bahan->getInsertID();

        $riwayat = [
            'bahan_id' => $bahanId,
            'kategori' => 'insert',
            'pesan' => 'Menambahkan bahan ' . $data['nama'] . ' dengan harga ' . $data['jual'],
            'detail_pesan' => 'Bahan baru ' . $data['nama'] . ' dengan harga beli ' . $data['beli'] . ' dan dijual dengan harga ' . $data['jual'],
        ];

        $this->riwayatBahan->insertRiwayatBahan($riwayat);

        session()->setFlashdata("success", 'Berhasil menambahkan data!');
        return redirect()->to(base_url('pemilik/kelola-bahan'));
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $data = [
                'bahan' => $this->bahan->getBahan($id)
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

        // Condition if file valid
        if ($file->isValid()) {
            $validation->setRules($this->myRules());
        } else {
            $arr = $this->myRules();
            unset($arr['foto']);
            $validation->setRules($arr);
        }

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $arr = implode("<br>", $errors);
            session()->setFlashdata("warning", $arr);
            return redirect()->to(base_url('pemilik/kelola-bahan'));
        }

        // Data to insert
        $capitalGain = ($data['jual'] - $data['beli']);
        $bahan = [
            'nama_bahan' => $data['nama'],
            'kualitas' => strtolower($data['kualitas']),
            'jenis' => strtolower($data['jenis']),
            'harga_beli' => $data['beli'],
            'harga_jual' => $data['jual'],
            'capital_gain' => $capitalGain,
            'keterangan' => $data['keterangan'],
        ];

        // Condition if file valid
        if ($file->isValid() && !$file->hasMoved()) {
            $nameFile =  time() . '-' . $file->getName();
            $file->move(FCPATH . 'assets/image/bahan', $nameFile);

            $bahan["foto_bahan"] = $nameFile;
        }

        $dataBahan = $this->bahan->getBahan($data['id']);

        // Check if harga not same with previous
        if ($dataBahan['harga_beli'] != $data['beli'] || $dataBahan['harga_jual'] != $data['jual']) {
            $riwayat = [
                'bahan_id' => $data['id'],
                'kategori' => 'update',
                'pesan' => 'Memperbarui bahan ' . $data['nama'] . ' dengan harga terbaru ' . $data['jual'],
                'detail_pesan' => 'Memperbarui bahan ' . $data['nama'] . ' dengan harga beli terbaru ' . $data['beli'] . ' dan dijual dengan harga terbaru ' . $data['jual'],
            ];
            $this->riwayatBahan->insertRiwayatBahan($riwayat);
        }

        $this->bahan->updateBahan($bahan, $data['id']);

        session()->setFlashdata("success", 'Berhasil memperbarui data!');
        return redirect()->to(base_url('pemilik/kelola-bahan'));
    }

    public function delete($id)
    {
        $dataBahan = $this->bahan->getBahan($id);

        $riwayat = [
            'bahan_id' => $id,
            'kategori' => 'delete',
            'pesan' => 'Menghapus bahan ' . $dataBahan['nama_bahan'],
            'detail_pesan' => 'Bahan ' . $dataBahan['nama_bahan'] . ' telah dihapus',
        ];
        $this->riwayatBahan->insertRiwayatBahan($riwayat);

        $this->bahan->deleteBahan($id);

        session()->setFlashdata("success", 'Record berhasil dihapus!');
        return redirect()->to(base_url('pemilik/kelola-bahan'));
    }

    public function indexAdmin()
    {
        $data = [
            'title' => 'Data Bahan',
            'list' => $this->bahan->getBahans(),
        ];

        return view('admin/bahan/index', $data);
    }
}
