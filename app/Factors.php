<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factors extends Model
{
    //
    protected $table    =   'factors';
    protected $fillable =   [
        'name', 'factor',   'price',    'created_at'
    ];
}
