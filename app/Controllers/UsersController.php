<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session']);
    }

    public function index()
    {
        $users = new UsersModel();
        $data = [
            'title' => 'Manajemen Users',
            'users' => $users->findAll(),
        ];
        return view('admin/users/index', $data);
    }
}
