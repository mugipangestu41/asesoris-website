<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class UsersModel extends Model
{
    protected $table = 't_admin';
    protected $primaryKey = 'noanggota';
    protected $allowedFields = ['noanggota', 'username', 'password'];


    public function getData($noanggota)
    {
        $query = $this->db->query("SELECT * FROM t_admin WHERE noanggota = '$noanggota'");

        return ($query->getResultArray())[0];
    }
    
}