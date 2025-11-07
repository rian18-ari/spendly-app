<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function transactions()
    {
        return $this->hasMany(transaction::class);
    }
}
