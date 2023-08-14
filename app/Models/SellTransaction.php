<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellTransaction extends Model
{
    use HasFactory;

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function sell()
    {
        return $this->belongsTo(Sell::class);
    }
}
