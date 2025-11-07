<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $fillable = [
        'amount',
        'note',
        'date',
        'type',
        'budget_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function budget()
    {
        return $this->belongsTo(budgets::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
