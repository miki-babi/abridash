<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    // Attributes
    //  
    protected $fillable = [
        'telegram_id',
        'name',
        'username',
        'phone_number',
        'is_registered',
        'source',
        'referred_by',
        'is_deleted',
    ];

    public function affiliates()
    {
        return $this->hasOne(Affiliate::class);
    }
}
