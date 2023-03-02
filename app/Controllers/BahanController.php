<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanModel;

class BahanController extends BaseController
{
    public function index()
    {
        $bahan = new BahanModel();
        $data['list'] = $bahan->getBahans();

        return view('pemilik/bahan/index', $data);
    }
}
