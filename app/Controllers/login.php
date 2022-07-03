<?php
 
namespace App\Controllers;
 
use App\Models\UsersModel;
 
class Login extends BaseController
{
    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        
    }

    public function v_login()
    {
        if(session()->has('username')){
			return redirect()->to(base_url('c_tampil/v_admin'));
		}

        return view('v_login');
    }
 
    public function process()
    {
      
        $noanggota = $this->request->getPost('noanggota');
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));
        $data = $this->UsersModel->getData($noanggota);

        if ($data) {
            $pass = $data['password'];
            if ($pass == $password) {
                session()->set([
                    'noanggota' => $data['noanggota'],
                    'username' => $data['username'],
                    'logged_in' => TRUE
                ]);
                return redirect()->to(base_url('c_tampil/v_admin'));
            } else {
                session()->setFlashdata('error', 'No Anggota atau Username atau Password Salah [1]');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'No Anggota atau Username atau Password Salah');
            return redirect()->back();
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login/v_login'));
    }
}