<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_role extends Model
{
    //
    protected $primaryKey  = 'user_id';
    protected $fillable = [
        'user_type',
        'user_status',
    ];
}
