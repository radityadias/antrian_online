<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Carbon\Carbon;
use Carbon\Traits\ToStringFormat;

class AntrianController extends Controller
{
    public function index() {
        $antrian = $this->getLastestAntrian();
        return view('user')->with(['antrian' => $antrian]);
    }

    public function getAllAntrian() {
        $list_antrian = Antrian::get()->all();
        return $list_antrian;
    }

    public function getLastestAntrian() {
        $antrian = Antrian::get()->last();
        return $antrian;
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
}
