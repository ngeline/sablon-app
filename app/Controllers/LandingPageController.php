<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KatalogModel;

class LandingPageController extends BaseController
{
    public function index()
    {
        $model = new KatalogModel();

        $perPage = 1;
        $searchTerm = $this->request->getVar('search') ? $this->request->getVar('search') : '';
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        if ($searchTerm) {
            $katalog = $model->like('nama_produk', $searchTerm)->paginate($perPage, 'default', $currentPage);
        } else {
            $katalog = $model->paginate($perPage, 'default', $currentPage);
        }

        $pager = $model->pager;

        $data = [
            'katalog' => $katalog,
            'pager' => $pager,
            'searchTerm' => $searchTerm
        ];

        return view('users/landingpage', $data);
    }
}
