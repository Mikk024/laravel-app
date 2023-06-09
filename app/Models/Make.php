<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    use HasFactory;

    public function model()
    {
        return $this->hasMany(CarModel::class);
    }

    public function listing()
    {
        return $this->hasMany(Listing::class);
    }
}
