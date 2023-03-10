<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderCustomController extends BaseController
{
    public function index()
    {
        return view('users/order-custom/index');
    }
}
