<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Store extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kategori', 'nama', 'detail', 'harga','foto', 'qty', 'berat'];
    public function selectAll()
    {
        $produk = $this->db->query("SELECT * FROM produk");

        return $produk->getResultArray();
    }

    public function find_id($id)
    {
        $query = $this->db->query("SELECT * FROM produk where id = '$id'");
        return ($query->getResultArray())[0];
    }

    
}
