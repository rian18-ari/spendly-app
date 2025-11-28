<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PerjalananDinas extends Model
{
    protected $table = 'perjalanan_dinas';

    protected $fillable = [
        'tujuan',
        'tanggal_berangkat',
        'tanggal_kembali',
        'keterangan',
        'budget_id',
    ];

    protected $guarded = [
        'id',
    ];
    public function budget()
    {
        return $this->belongsTo(budgets::class);
    }
}
