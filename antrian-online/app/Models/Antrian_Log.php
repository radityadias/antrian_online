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

    public function antrian() {
        return $this->belongsTo(Antrian::class);
    }

    public $timestamps = false;
}
