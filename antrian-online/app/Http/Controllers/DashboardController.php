<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AntrianController;
use Illuminate\Http\Request;

class DashboardController extends AntrianController
{
    public function index()
    {
        $list_antrian = $this->getAllAntrian();
        $antrian_aktif = $this->getLastestAntrian();

        return view('dashboard_admin')->with(['list_antrian' => $list_antrian, 'antrian_aktif' => $antrian_aktif]);
    }
}
