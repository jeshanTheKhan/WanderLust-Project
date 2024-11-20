<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    protected $primaryKey  = 'place_id';
    protected $fillable = [
        'place_name',
        'place_slug',
        'place_status',
    ];
}
