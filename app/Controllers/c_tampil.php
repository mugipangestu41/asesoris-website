<?php

namespace App\Controllers; 

use CodeIgniter\Controller;
use App\Models\m_store;
use App\Models\penjualan;

class c_tampil extends BaseController
{
    protected $storeModel;
    protected $penjulanModel;
    public function __construct()
    {
        $this->storeModel = new M_Store();
        $this->penjualanModel = new penjualan();
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
    public function v_cart()
    {
     
        return view('v_cart');
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
            'berat' => $product['berat'],
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

    public function tampil_input($total)
    {
        $tot = $total;
        $data['tot'] = $tot;
        return view('v_input', $data);
        
        
    }

    public function v_inputBarang()
    {
        if(!session()->has('username')){
			return redirect()->to(base_url('login/v_login'));
		}
		$data['username']  = session()->get('username');
        $session = session();
        echo "Welcome back, ".$session->get('username');
		
        return view('v_inputBarang');
        
        
    }

    public function v_admin()
    {
        $produk = $this->storeModel->selectAll();

        $data = [
            'produk' => $produk
        ];

        if(!session()->has('username')){
			return redirect()->to(base_url('login/v_login'));
		}
		$data['username']  = session()->get('username');
        $session = session();
        echo "Welcome back, ".$session->get('username');
		
        return view('v_admin', $data);
        
        
    }

    public function CekOngkir(){


        $db = \Config\Database::connect();

        $ongkir = $db->table('ongkir');
            
        $tot_harga = $this->request->getPost('total');
        $awal = $this->request->getPost('kodepos_awal');
        $akhir = $this->request->getPost('kodepos_akhir');
        $multi = array(
            'kodepos_awal' => $awal,
            'kodepos_akhir' => $akhir
        );

        $ongkir->where($multi);
        $query = $ongkir->get();
        $getOngkir = $query->getResult();
       

        $perkilo = $getOngkir[0]->ongkir_perkilo;
        
        $session = \Config\Services::session();
        
        $tot_berat = 0;
        foreach($session->get('cart') as $cart)
        {
            $berat = $db->table('produk');
            $berat -> where('id', $cart["id"]);
            $q = $berat->get();
            $getBerat = $q->getResult();
            $kg = $getBerat[0]->berat/1000;
            $kg2 = $kg * $cart["qty"] ;
            $tot_berat = $tot_berat + $kg2;
            
        }
    
        if ($tot_berat < 1) {
            $beratOngkir = 1;
        } else {
            $split = explode(".", $tot_berat);
            if ($split[1] > (3 * pow(10, strlen($split[1]) - 1))) {
                $beratOngkir = $split[0] + 1;
            } else {
                $beratOngkir = $split[0];
            }
        }
        
      
        $data2['kilogram'] = $tot_berat * 1000;

        $data2['bo'] = $beratOngkir;
        $data2['convert'] = $beratOngkir * $perkilo;
        $data2['tot_harga'] = $tot_harga;

        return view('v_input', $data2);
    }

    public function inputTrx()
    {
        $db = \Config\Database::connect();
        $dataPenjualan = [
            "tanggal_penjualan" => date('Y-m-d H:i:s'),
            "nama" => $this->request->getPost('nama'),
            "no_hp" => $this->request->getPost('no_hp'),
            "alamat" => $this->request->getPost('alamat'),
            "kecamatan" => $this->request->getPost('kecamatan'),
            "kabupaten" => $this->request->getPost('kabupaten'),
            "total_belanja" => $this->request->getPost('total_pembayaran'),
        ];
        
        $insertJual = $this->penjualanModel->insert($dataPenjualan);
         
         $session = \Config\Services::session();      
         foreach($session->get('cart') as $cart)
         {
             if($cart['qty'] != 0 )
             {
                 //update stock product's stock
                 $builder = $db->table('produk');
                 $builder->where('id', $cart["id"]);
                 $query = $builder->get();
                 $getRow = $query->getResult();

                 

               
                 $builder->where('id', $cart["id"]);
                 $builder->update(['qty'=> ( $getRow[0]->qty- $cart["qty"])]);
                
                 // Save cart to jual
                 $latestPenjualan = $insertJual;
                 $dataJual = [
                     'no_transaksi' => $latestPenjualan,
                     'kode_barang' => $cart["id"],
                     'qty' => $cart["qty"],
                     'harga' => $cart["qty"]* $cart["harga"],
                 ];
                 $db->table('jual')->insert($dataJual);
                 
             }
         }


         session()->remove('cart');
  
        return view('v_invoice', $dataPenjualan);
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

    public function total()
    {

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

    public function create()
    {
        $dataFoto = $this->request->getFile('foto');
		$fileName = $dataFoto->getRandomName();
        $this->storeModel->insert([
            'kategori'   => $this->request->getVar('kategori'),
            'nama' => $this->request->getVar('nama'),
            'detail' => $this->request->getVar('detail'),
            'harga' => $this->request->getVar('harga'),
            'foto' => $fileName,
            'qty' => $this->request->getVar('qty'),
            'berat' => $this->request->getVar('berat')
        ]);
        $dataFoto->move('uploads', $fileName);

        return $this->response->redirect(base_url('c_tampil/v_admin'));
    }

 


}



