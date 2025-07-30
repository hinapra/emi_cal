<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;
       protected $fillable = ['months'];

    public function emiRules()
    {
        return $this->hasMany(EmiRule::class);
    }
}
