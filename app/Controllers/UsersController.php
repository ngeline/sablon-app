<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class UsersController extends BaseController
{
    protected $users;

    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session', 'text']);
        $this->users = new UsersModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Users',
            'users' => $this->users->findAll(),
        ];
        return view('pemilik/users/index', $data);
    }

    private function UsersRules()
    {
        $UsersRules = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required'
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required'
            ],
            'role' => [
                'label' => 'Role',
                'rules' => 'required'
            ],
        ];
        return $UsersRules;
    }

    public function store()
    {
        $data = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules($this->UsersRules());

        if (!$validation->run($_POST)) {
            $errors = $validation->getErrors();
            $arr = implode("<br>", $errors);
            session()->setFlashdata("warning", $arr);
            return redirect()->to(base_url('pemilik/users'));
        }

        $users  = [
            'username'  => $data['username'],
            'password'  => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'      => $data['role'],
        ];

        $this->users->insertUser($users);

        session()->setFlashdata('success', 'Berhasil Menambahkan Data Users');
        return redirect()->to(base_url('pemilik/users'));
    }
}
