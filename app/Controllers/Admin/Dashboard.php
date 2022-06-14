<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('admin/dashboard/index');
    }

    public function category()
    {
        echo "Halaman category, halo ";
    }
}
