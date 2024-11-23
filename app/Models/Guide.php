<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    //
    protected $primaryKey  = 'guide_id';
    protected $fillable = [
        'guide_name',
        'guide_fb',
        'guide_instagram',
        'guide_linkdln',
        'guide_twitter',
        'place',
        'guide_image',
        'guide_status',
    ];
}
