<?php

namespace App\Controllers;

use App\Models\M_model;

class transaksi extends BaseController
{
    public function index()
    {
        $model = new M_model();

        $data['a'] = $model->tampil('barang');
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/transaksi/view', $data);
        echo view('/template/footer');
    }
    public function bukti()
    {
        $model = new M_model();
        $on = 'barang_keluar.id_barang_barang=barang.id_barang';

        $data['vuser'] = $model->join2('barang_keluar', 'barang', $on);
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/transaksi/bukti_view', $data);
        echo view('/template/footer');
    }
    public function aksi_transaksi()
    {
        $model = new M_model();
        $a = $this->request->getPost('id_barang_barang');
        $b = $this->request->getPost('stock');
        $c = $this->request->getPost('harga_total');
        $d = $this->request->getPost('nama_customer');
        $e = $this->request->getPost('uang');
        $f = $this->request->getPost('kembalian');

        $stock = array(
            'id_barang_barang' => $a,
            'nama_customer' => $d,
            'stock' => $b,
            'harga_total' => $c,
            'kembalian' => $f,
            'uang' => $e
        );

        $model->simpan('barang_keluar', $stock);
        return redirect()->to('/barang');
        // print_r($stock);
    }
}