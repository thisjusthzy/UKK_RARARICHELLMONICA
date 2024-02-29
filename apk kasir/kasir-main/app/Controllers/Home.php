<?php

namespace App\Controllers;

use App\Models\M_model;

class Home extends BaseController
{
    public function index()
    {
        echo view('/template/header');
        echo view('/login/login');
        echo view('/template/footer');
    }
    public function aksi_login()
    {
        $u = $this->request->getPost('username');
        $p = $this->request->getPost('password');
        $model = new M_model();
        $data = array(
            'username' => $u,
            'password' => md5($p)
        );
        $cek = $model->getWhere2('user', $data);

        if ($cek > 0) {
            session()->set('id', $cek['id_user']);
            session()->set('username', $cek['username']);
            session()->set('email', $cek['email']);
            session()->set('level', $cek['level']);
            return redirect()->to('/dashboard');
        } else {
            // Tambahkan kode berikut
            session()->setFlashdata('error', 'Salah password');
            return redirect()->to('/home');
        }
    }

}