<?php

namespace App\Controllers;

use App\Models\M_model;

class barang extends BaseController
{
    public function index()
    {
        $model = new M_model();

        $on = 'barang.created_by=user.id_user';
        $on2 = 'barang.id_barang=barang_masuk.id_barang_barang';
        $data['vuser'] = $model->tampil('barang');
        $data['vuser'] = $model->join3('barang', 'user', 'barang_masuk', $on, $on2);
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/barang/view', $data);
        echo view('/template/footer');
    }
    public function add()
    {

        echo view('/template/header');
        echo view('/template/menu');
        echo view('/barang/add');
        echo view('/template/footer');
    }
    public function hapus($id)
    {
        $model = new M_model();


        $where1 = array('id_barang' => $id);
        $model->hapus('barang', $where1);

        return redirect()->to(base_url('/barang'));
    }
    public function addbarang()
    {
        $model = new M_model();

        $data['user'] = $model->tampil('barang');
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/barang/add', $data);
        echo view('/template/footer');
    }
    public function aksi_addbarang()
    {
        $model = new M_model();
        $nama = $this->request->getPost('nama_barang');
        $jumlah = $this->request->getPost('jumlah');
        $harga = $this->request->getPost('harga');

        // Generate Kode Barang
        $kode_barang = $this->generateKodeBarang($nama);

        $barang = array(
            'kode_barang' => $kode_barang,
            'nama_barang' => $nama,
            'jumlah' => $jumlah,
            'harga' => $harga,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('id')
        );

        $model->simpan('barang', $barang);
        return redirect()->to('/barang');
    }

    public function addstock()
    {
        $model = new M_model();
        $data['a'] = $model->tampil('barang');
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/barang/tambahstock', $data);
        echo view('/template/footer');
    }
    public function aksi_addstock()
    {
        $model = new M_model();
        $a = $this->request->getPost('id_barang_barang');
        $b = $this->request->getPost('stock');
        $c = $this->request->getPost('supplier');

        $stock = array(
            'id_barang_barang' => $a,
            'stock' => $b,
            'supplier' => $c
        );

        $model->simpan('barang_masuk', $stock);
        return redirect()->to('/barang');
        // print_r($stock);
    }
    // Fungsi untuk menghasilkan kode barang unik
    private function generateKodeBarang($nama_barang)
    {
        // Implementasi logika untuk menghasilkan kode barang
        // Contoh: Ambil huruf pertama dari setiap kata dalam nama_barang dan tambahkan beberapa angka acak
        $words = explode(" ", $nama_barang);
        $code = "";
        foreach ($words as $word) {
            $code .= substr($word, 0, 1);
        }
        $code .= rand(100, 999);

        return strtoupper($code); // Kode barang diubah menjadi huruf besar
    }

}