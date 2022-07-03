<?php

namespace App\Controllers; 

use CodeIgniter\Controller;
use App\Models\m_store;

class c_tampil extends BaseController
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
    public function cart()
    {
        $data['items'] = array_values(session('cart'));
        return view('v_cart', $data);
    }

    public function buy($id)
    {
        $product = $this->storeModel->find_id($id);
        $session = \Config\Services::session();
        $item = array(
            'id' => $product['id'],
            'nama' => $product['nama'],
            'foto' => $product['foto'],
            'harga' => $product['harga'],
            'total' => 0,
            'qty' => 1
            
        );
        $session=session();
        if ($session->has('cart')){
            $index = $this->exists($id);
            $cart = array_values(session('cart'));
            if ($index == -1){
                array_push($cart, $item);
                
            }
            else{
                $cart[$index]['qty']++;
                
            }
            $session->set('cart', $cart);
        }
        else{
            $cart = array($item);
            $session->set('cart', $cart);
        }
  
        return $this->response->redirect(site_url('c_tampil/cart'));
    }
    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session->set('cart', $cart);
        return $this->response->redirect(site_url('c_tampil/cart'));
        
    }

    public function remove_all()
    {

        $session = session();
        $session->destroy();
        return view('v_cart');
        
    }

    public function tampil_input()
    {

        return view('v_input');
        
    }
    public function update()
    {
        $cart = array_values(session('cart'));
        for ($i=0; $i<count($cart); $i++) {
            $cart[$i]['qty'] = $_POST['qty'][$i];

        }
        $session = session();
        $session->set('cart', $cart);
        return $this->response->redirect(site_url('c_tampil/cart'));
    }

    private function exists($id)
    {
        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
        return -1;
    }
    
 


}



