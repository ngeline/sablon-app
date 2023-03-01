<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class AuthController extends BaseController
{

    public function __construct()
    {
        helper(['form', 'url', 'validation', 'session']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function postLogin()
    {
        //ambil data dari semua form
        $data = $this->request->getPost();

        //ambil data user di database yang usernamenya sama
        $userModel = new UsersModel();
        $user = $userModel->where('username', $data['username'])->first();

        //cek username apakah sudah sesuai dengan database
        if ($user) {
            //cek password, jika salah kembalikan dengan error ke halaman login
            if (!password_verify($data['password'], $user['password'])) {
                return redirect()->to(base_url('login'))->with('error', 'Invalid username or password');
            }
            //jika sesuai, arahkan user masuk ke admin dashboard

            $session = session();
            $session->set('logged_in', true);
            $session->set('username', $user['username']);
            $session->set('role', $user['role']);
            $session->set('id', $user['id']);

            return redirect()->to(base_url('dashboard'));
        } else {
            return redirect()->to(base_url('login'))->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();

        return redirect()->to(base_url('login'));
    }
}
