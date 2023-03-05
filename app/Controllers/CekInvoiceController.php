<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CekInvoiceController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Invoice Pages'
        ];
        return view('users/cekinvoice/index', $data);
    }
}
