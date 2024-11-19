<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Carosel;

class Carosel extends Model
{
    //
    protected $primaryKey  = 'carosel_id';
    protected $fillable = [
        'header1',
        'header2',
        'header3',
        'link',
        'images',
        'status',
    ];
}
