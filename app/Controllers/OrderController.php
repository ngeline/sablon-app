<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OrderController extends BaseController
{
    public function index()
    {
        return view('users/order/index');
    }
}
