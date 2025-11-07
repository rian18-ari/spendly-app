<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budgets extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'total_amount',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }

    public function perjalananDinas()
    {
        return $this->hasMany(PerjalananDinas::class);
    }
}
