<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    //
    protected $primaryKey  = 'package_id';
    protected $fillable = [
        'package_name',
        'short_description',
        'package_images',
        'package_slug',
        'main_description',
        'package_status',
    ];
}
