<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class budgetmaster extends Model
{
    protected $table = 'budgetmasters';
    protected $fillable = [
        'budget',
        'tahun_anggaran',
        'detail',
        'user_id'
    ];
}
