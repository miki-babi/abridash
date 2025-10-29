<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    //
    // Attributes
    //      
    protected $fillable = [
        'name',
        'student_id',
        'total_referrals',
        'converted_referrals',
        'total_earnings',
        'withdrawn_earnings',
        'remaining_balance',
        'referral_code',
        'is_active',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
