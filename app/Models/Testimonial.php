<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $primaryKey  = 'testimonial_id';
    protected $fillable = [
        'client_name',
        'client_comment',
        'client_location',
        'client_image',
        'status',
    ];
}
