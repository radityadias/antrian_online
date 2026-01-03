<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Antrian_Log extends Model
{
    protected $table = 'antrian_log';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'status',
        'waktu_perubahan',
        'antrian_id',
    ];

    public function Antrian() {
        return $this->belongsTo(Antrian::class, 'antrian_id', 'id');
    }

    public $timestamps = false;
}
