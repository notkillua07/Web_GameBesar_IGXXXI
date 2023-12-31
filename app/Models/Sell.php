<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    public function sellTransaction()
    {
        return $this->hasMany(SellTransaction::class);
    }

}
