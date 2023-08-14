<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuyTransaction extends Model
{
    use HasFactory;

    public function expedition()
    {
        return $this->belongsTo(Expedition::class);
    }

    public function inventory()
    {
        return $this->belongsTo(Inventory::class);
    }

    public function buy()
    {
        return $this->belongsTo(Buy::class);
    }
}
