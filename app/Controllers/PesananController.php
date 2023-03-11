<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PesananController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Kelola Pesanan',
        ];
        return view('admin/pesanan/index', $data);
    }
}