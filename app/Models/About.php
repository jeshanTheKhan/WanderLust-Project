<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
    protected $primaryKey  = 'about_id';
    protected $fillable = [
        'name',
        'position',
        'hotel_name',
        'image',
        'description',
        'status',
    ];
}
