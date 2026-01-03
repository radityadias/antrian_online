<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AntrianController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends AntrianController
{
    public function homeIndex()
    {
        $antrian_menunggu = $this->getLatestAntrianMenunggu();
        $total_antrian_menunggu = count($this->getAllAntrianMenunggu());
        $total_antrian_selesai = count($this->getAllAntrianSelesai());
        $total_antrian = $total_antrian_menunggu + $total_antrian_selesai;

        return view('dashboard_home')->with(['antrian_menunggu' => $antrian_menunggu, 'total_antrian_menunggu' => $total_antrian_menunggu, 'total_antrian_selesai' => $total_antrian_selesai, 'total_antrian' => $total_antrian]);
    }

    public function antrianIndex() {
        $list_antrian = $this->getAllAntrianDiproses();
        
        return view('dashboard_antrian')->with(['antrian_diproses' => $list_antrian]);
    }

    public function logIndex() {
        $log_antrian = $this->getAllAntrianLog();
        Log::info($log_antrian);
        
        return view('dashboard_log')->with(['log_antrian' => $log_antrian]);
    }
}
