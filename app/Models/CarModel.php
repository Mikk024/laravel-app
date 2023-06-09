<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;


    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function listing()
    {
        return $this->hasMany(Listing::class);
    }
}
