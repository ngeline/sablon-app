<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KatalogModel;
use App\Models\PemesananModel;
use App\Models\PemesananKatalogModel;

class PesananController extends BaseController
{
    protected $katalog;
    protected $pemesanan;
    protected $pemesananKatalog;

    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session', 'text']);
        $this->katalog = new KatalogModel();
        $this->pemesanan = new PemesananModel();
        $this->pemesananKatalog = new PemesananKatalogModel();
    }

    private function rulesPemesanan()
    {
        $rules = [
            'nama' => [
                'label' => 'Nama Pemesan',
                'rules' => 'required'
            ],
            'ktp' => [
                'label' => 'KTP Pemesan',
                'rules' => 'required|is_natural_no_zero|exact_length[16]'
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required|is_natural_no_zero'
            ],
            'tanggal_pemesanan' => [
                'label' => 'Tanggal Pemesanan',
                'rules' => 'required'
            ],
            'alamat_pemesan' => [
                'label' => 'Alamat Pemesan',
                'rules' => 'required'
            ],
            'alamat_pengiriman' => [
                'label' => 'Alamat Pengiriman',
                'rules' => 'required'
            ],
            'katalog.*' => [
                'label' => 'Produk',
                'rules' => 'required'
            ],
            'qty.*' => [
                'label' => 'Jumlah Barang',
                'rules' => 'required|is_natural_no_zero'
            ],
            'jenis_pelunasan' => [
                'label' => 'Jenis Pelunasan',
                'rules' => 'required'
            ],
            'total_terbayar' => [
                'label' => 'Total Terbayar',
                'rules' => 'required|is_natural_no_zero'
            ],
            'keterangan' => [
                'label' => 'Keterangan Pesanan',
                'rules' => 'required'
            ]
        ];

        return $rules;
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Pesanan',
        ];
        return view('admin/pesanan/index', $data);
    }

    public function katalog()
    {
        $data = [
            'title' => 'Input Pesanan Sesuai Katalog',
            'katalog' => $this->katalog->getKatalogs()
        ];
        return view('admin/pesanan/create-katalog', $data);
    }

    public function custom()
    {
        $data = [
            'title' => 'Input Pesanan Custom',
        ];
        return view('admin/pesanan/create-custom', $data);
    }

    public function storeAdminPemesananKatalog()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules($this->rulesPemesanan());

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $arr = implode("<br>", $errors);
            session()->setFlashdata("warning", $arr);
            return redirect()->to(base_url('admin/input-katalog'));
        }

        $totalProduk = 0;
        foreach ($data['katalog'] as $value) {
            $dataKatalog = $this->katalog->getKatalog($value);
            $totalProduk += $dataKatalog['harga_jual'];
        }

        $totalJasa = 0;

        $totalBiayaLainnya = 0;
        if ($data['biaya_lainnya']) {
            $totalBiayaLainnya = $data['biaya_lainnya'];
        }

        $totalPembayaran = $totalProduk + $totalJasa + $totalBiayaLainnya;

        $adminId = session()->get('id');

        $dataPemesanan = [
            'kode_resi' => time() . random_int('11111', '99999'),
            'nama_pemesan' => $data['nama'],
            'ktp_pemesan' => $data['ktp'],
            'telepon_pemesan' => $data['no_hp'],
            'alamat_pemesan' => $data['alamat_pemesan'],
            'alamat_pengiriman' => $data['alamat_pengiriman'],
            'tanggal_pemesanan' => $data['tanggal_pemesanan'],
            'via_pemesanan' => 'onspot',
            'jenis_pemesanan' => 'normal',
            'jenis_pelunasan' => $data['jenis_pelunasan'],
            'jenis_pembayaran' => 'tunai',
            'total_bahan' => $totalProduk,
            'total_jasa' => $totalJasa,
            'total_pembayaran' => $totalPembayaran,
            'total_terbayar' => $data['total_terbayar'],
            'status_pemesanan_admin' => 'diterima',
            'status_pembayaran_admin' => 'diterima',
            'keterangan_pesanan_admin' => $data['keterangan'],
            'validasi_admin_id' => $adminId
        ];

        if ($data['biaya_lainnya']) {
            $dataPemesanan['total_biaya_lainnya'] = $data['biaya_lainnya'];
        }

        $this->pemesanan->insertPemesanan($dataPemesanan);
        $pemesananId = $this->pemesanan->getInsertID();

        for ($i = 0; $i < count($data['katalog']); $i++) {
            $dataPemesananKatalog = [
                'pemesanan_id' => $pemesananId,
                'katalog_id' => $data['katalog'][$i],
                'jumlah_pemesanan' => $data['qty'][$i],
            ];

            $this->pemesananKatalog->insertPemesananKatalog($dataPemesananKatalog);
        }

        session()->setFlashdata("success", 'Berhasil menambahkan data!');
        return redirect()->to(base_url('admin/pesanan'));
    }
}
