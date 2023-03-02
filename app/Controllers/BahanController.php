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
        helper(['form', 'url', 'validation', 'session']);
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
}
