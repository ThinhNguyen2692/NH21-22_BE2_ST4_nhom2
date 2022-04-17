<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufactures extends Model
{
    use HasFactory;
    public function Products(){
      //  return this->hasMany(Products::class, 'id','id');
    }
}
