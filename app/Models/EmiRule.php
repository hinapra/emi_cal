<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiRule extends Model
{
    use HasFactory;

    protected $fillable = ['min_amount', 'max_amount', 'months_id', 'interest_rate'];

    public function month()
    {
        return $this->belongsTo(Month::class, 'months_id');
    }

}
