<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }

    public function sell(){
        return $this->hasMany(Sell::class);
    }

    
    public function buy(){
        return $this->hasMany(Buy::class);
    }
}
