<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RiwayatBahanModel;

class InfoHargaBahanController extends BaseController
{
    protected $riwayatBahan;

    public function __construct()
    {
        helper(['url', 'session']);
        $this->riwayatBahan = new RiwayatBahanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Informasi Harga Bahan Terbaru',
            'list' => $this->riwayatBahan->orderBy('created_at', 'desc')->findAll()
        ];

        return view('admin/info/index', $data);
    }

    public function notif()
    {
        if ($this->request->isAJAX()) {
            $today = date('Y-m-d');
            $jmlRiwayat = $this->riwayatBahan->where('DATE(created_at)', $today)->countAllResults();

            return $this->response->setJSON($jmlRiwayat);
        }
    }
}
