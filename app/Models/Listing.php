<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fuel',
        'body',
        'images',
        'make_id',
        'model_id',
        'color',
        'year',
        'horsepower',
        'transmission',
        'capacity',
        'doors'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function make()
    {
        return $this->belongsTo(Make::class);
    }

    public function model()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
