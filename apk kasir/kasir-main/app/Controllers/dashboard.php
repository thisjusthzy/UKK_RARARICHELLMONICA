<?php

namespace App\Controllers;

use App\Models\M_model;

class dashboard extends BaseController
{
    public function index()
    {
        $model = new M_model();
        $data['totalUsers'] = $model->getTotalUsers();
        echo view('/template/header');
        echo view('/template/menu');
        echo view('/dashboard/dashboard', $data);
        echo view('/template/footer');
    }
}