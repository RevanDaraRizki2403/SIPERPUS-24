<?php

namespace App\Models;

use App\IsReturn;
use Illuminate\Database\Eloquent\Model;

class LoanDetail extends Model
{
    protected $fillable = [
        'loan_id',
        'book_id',
        'is_return',
    ];
    protected $casts = [
        'is_return'=> IsReturn::class,
    ];
    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
