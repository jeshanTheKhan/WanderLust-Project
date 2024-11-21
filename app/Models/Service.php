<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $primaryKey  = 'service_id';
    protected $fillable = [
        'service_header',
        'service_description',
        'service_icon',
        'service_status',
    ];
}
