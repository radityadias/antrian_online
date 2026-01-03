<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use App\Models\Antrian_Log;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    public function index() {
        $antrian = $this->getLatestAntrianMenunggu();
        return view('user')->with(['antrian' => $antrian]);
    }

    public function getAllAntrianMenunggu() {
        $list_antrian = Antrian::get()->all();
        return $list_antrian;
    }

    public function getAllAntrianDiproses() {
        $list_antrian = Antrian::where('status', 'diproses')->get();
        return $list_antrian;
    }
    
    public function getAllAntrianSelesai() {
        $list_antrian = Antrian::where('status', 'selesai')->get();
        return $list_antrian;
    }

    public function getAllAntrianLog() {
        $log_antrian = Antrian_Log::get();
        return $log_antrian;
    }

    public function getLastestAntrian() {
        $antrian = Antrian::orderBy('waktu_dibuat', 'desc')->first();
        return $antrian;
    }

    public function getLatestAntrianMenunggu() {
        $antrian = Antrian::where('status', 'menunggu')->orderBy('waktu_dibuat', 'asc')->first();
        if ($antrian) {
            return $antrian;
        } else {
            return; 
        }
    }

    public function addAntrian() {
        $antrian = $this->getLastestAntrian();
        if ($antrian) {
            Antrian::create([
                'nomor' => 'A00' . strval($antrian->id + 1),
                'status' => 'menunggu',
                'tanggal' => Carbon::now()->format('d-m-y'),
                'waktu_dibuat' => Carbon::now(),
            ]);
        } else {
             Antrian::create([
                'nomor' => 'A000',
                'status' => 'menunggu',
                'tanggal' => Carbon::now()->format('d-m-y'),
                'waktu_dibuat' => Carbon::now(),
            ]);
        }

        return back()->with(['success' => 'Antrian dicetak']);
    }


    public function updateAntrian($id) {
        $data = Antrian::find($id);
        
        if($data) {
            $data->status = 'diproses';
            $data->waktu_dipanggil = Carbon::now();
            $data->save();

            Antrian_Log::create([
               'status' => 'dipanggil',
                'waktu_perubahan' => Carbon::now(),
                'antrian_id' => $data->id
            ]);

            $total_antrian_menunggu = count($this->getAllAntrianMenunggu());

            return back()->with(['total_antrian_menunggu' => $total_antrian_menunggu]);
        } else {
            return back()->withErrors(['message' => 'Kesahalah saat memangguil antrian']);
        };
    }

    public function finishAntrian($id) {
        $data = Antrian::find($id);
        $log_data = Antrian_Log::find($id);

        if ($data) {
            $data->status = 'selesai';
            $data->waktu_selesai = Carbon::now();
            $data->save();

            $log_data->status = "selesai";
            $log_data->waktu_perubahan = Carbon::now();
            $log_data->save();

            return back();
        }
    }
}
