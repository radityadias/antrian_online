<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nama',
        'password',
    ];

    public $timestamps = false;
}
