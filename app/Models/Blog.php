<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $primaryKey  = 'blog_id';
    protected $fillable = [
        'blog_header',
        'blog_posted',
        'blog_date',
        'blog_short_description',
        'blog_main_description',
        'blog_main_image',
        'blog_status',
    ];
}

