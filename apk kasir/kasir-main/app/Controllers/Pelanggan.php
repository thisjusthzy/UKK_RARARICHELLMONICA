<?php

namespace App\Controllers;

use App\Models\M_model;

class user extends BaseController
{
    public function index()
    {
        $model = new M_model();

        $data['vuser'] = $model->tampil('pelanggan');
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/user/pelanggan', $data);
        echo view('/template/footer');
    }
    public function add()
    {
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/user/addp');
        echo view('/template/footer');
    }
    public function reset($id)
    {
        $model = new M_model();
        $where = array('id_user' => $id);

        // Generate an MD5 hash for the new password
        $newPassword = 'aaaa'; // Replace 'aaaa' with your desired new password
        $hashedPassword = md5($newPassword);

        // Prepare the updated data
        $user = array('password' => $hashedPassword);

        // Call the qedit method to update the user's password
        $model->qedit('user', $user, $where);

        // Uncomment the following line to enable redirection
        return redirect()->to('/user');
    }
    public function adduser()
    {
        $model = new M_model();

        $data['user'] = $model->tampil('user');
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/user/add', $data);
        echo view('/template/footer');
    }
    public function aksi_adduser()
    {
        $model = new M_model();
        // $on='guru.user = user.id_user';
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $level = $this->request->getPost('level');

        $user = array(
            'username' => $username,
            'password' => md5('password'),
            'email' => $email,
            'level' => '2',
            'created_at' => date('Y-m-d H:i:s')
        );

        $model = new M_model();
        $model->simpan('user', $user);
        return redirect()->to('/user');
    }
    public function hapus($id)
    {
        $model = new M_model();

        // Kondisi untuk menghapus data dari tabel 'anggota'
        $where1 = array('id_user' => $id);
        $model->hapus('user', $where1);

        return redirect()->to(base_url('/user'));
    }


}