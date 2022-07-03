<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_Store;
class Home extends BaseController
{
    protected $storeModel;
    public function __construct()
    {
        $this->storeModel = new M_Store();
    }
    public function index()
    {
        $produk = $this->storeModel->selectAll();

        $data = [
            'produk' => $produk
        ];

        return view('v_home', $data);
    }
}
