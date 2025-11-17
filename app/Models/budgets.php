<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budgets extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'total_amount',
        'detail',
        'user_id',
        'name',
        'budgetmaster_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'budget_users');
    }

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }

    public function perjalananDinas()
    {
        return $this->hasMany(PerjalananDinas::class);
    }

    public function budget_dinas()
    {
        return $this->belongsTo(budgetmaster::class);
    }
}
