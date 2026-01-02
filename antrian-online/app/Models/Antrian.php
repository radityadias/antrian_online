<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nomor',
        'status',
        'tanggal',
        'waktu_dibuat',
        'waktu_dipanggil',
        'waktu_selesai',
        'admin_id',
    ];

    public $timestamps = false;


}
