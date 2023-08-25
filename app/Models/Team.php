<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $timestam
    use HasFactory;

    public function inventory(){
        return $this->hasMany(Inventory::class);
    }
}
