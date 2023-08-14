<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    public function sell(){
        return $this->hasMany(Sell::class);
    }

    
    public function buy(){
        return $this->hasMany(Buy::class);
    }
}
