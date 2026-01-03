<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AntrianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AntrianController
{
    public function homeIndex()
    {
        $list_antrian = $this->getAllAntrianMenunggu();
        $antrian_aktif = $this->getLatestAntrianMenunggu();
        $user = Auth::user();

        return view('dashboard_home')->with(['list_antrian' => $list_antrian, 'antrian_aktif' => $antrian_aktif, 'total_antrian' => count($list_antrian), 'user' => $user]);
    }

    public function antrianIndex() {
        $list_antrian = $this->getAllAntrianDiproses();
        
        return view('dashboard_antrian')->with(['antrian_diproses' => $list_antrian]);
    }
}
