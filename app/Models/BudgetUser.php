<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetUser extends Model
{
    protected $fillable = [
        'budget_id',
        'user_id'
    ];
}
