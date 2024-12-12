<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id',
        'loan_at',
        'return_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function loan_detail()
    {
        return $this->hasMany(LoanDetail::class);
    }
}
