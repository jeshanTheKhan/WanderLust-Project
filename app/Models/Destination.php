<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    //
    protected $primaryKey  = 'destination_id';
    protected $fillable = [
        'destination_place',
        'destination_image',
        'destination_status',
    ];
}
