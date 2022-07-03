<?php

namespace App\Models;

use CodeIgniter\Model;

class penjualan extends Model
{
    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['no_transaksi', 'tanggal_penjualan', 'nama', 'no_hp', 'alamat','kecamatan', 'kabupaten', 'total_belanja'];
    public function selectAll()
    {
        $penjualan = $this->db->query("SELECT * FROM penjualan");

        return $penjualan->getResultArray();
    }

    public function find_id($id)
    {
        $query = $this->db->query("SELECT * FROM penjualan where id = '$id'");
        return ($query->getResultArray())[0];
    }

    
}
