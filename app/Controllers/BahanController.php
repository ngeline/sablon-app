<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BahanController extends BaseController
{
    public function index()
    {
        return view('pemilik/bahan/index');
    }
}
