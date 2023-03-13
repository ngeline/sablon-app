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
    
    public function katalog()
    {
        $data = [
            'title' => 'Input Pesanan Sesuai Katalog',
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

    public function store()
    {
        $data = $this->request->getPost();
        
    }
}