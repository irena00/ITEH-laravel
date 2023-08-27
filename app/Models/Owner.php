<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'age',
        'is_invalid',
        'nationality',
        'driver_license'
    ];


}
