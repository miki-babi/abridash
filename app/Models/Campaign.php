<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    // Attributes
    //      
    protected $fillable = [
        'name',
        'link',
        'referred_count',
        'converted_count',
        'cost',
    ];
}
