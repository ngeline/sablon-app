<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanModel;
use App\Models\KatalogBahanModel;
use App\Models\KatalogModel;

class LandingPageController extends BaseController
{
    protected $katalog;
    protected $katalogBahan;
    protected $bahan;

    public function __construct()
    {
        $this->katalog = new KatalogModel();
        $this->katalogBahan = new KatalogBahanModel();
        $this->bahan = new BahanModel();
    }

    public function index()
    {
        $model = $this->katalog;

        $perPage = 2;
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

    public function detailProduk()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $dataKatalogBahan = $this->katalogBahan->select('id')->where('katalog_id', $id)->findAll();

            $arr = [];

            foreach ($dataKatalogBahan as $value) {
                $dataBahan = $this->bahan->where('id', $value['id'])->withDeleted('bahan')->first();
                $span = "<button type='button' class='btn btn-sm btn-success' disabled>" . $dataBahan['nama_bahan'] . "</button>";
                array_push($arr, $span);
            }

            $namaBahan = implode(" ", $arr);

            $data = [
                'katalog' => $this->katalog->getKatalog($id),
                'spanBahan' => $namaBahan
            ];

            $encoded_data = base64_encode(json_encode($data));

            return $this->response->setContentType('application/json')
                ->setJSON(array('data' => $encoded_data));
        }
    }
}
