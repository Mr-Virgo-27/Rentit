<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'vehicle_type',
        'model',
        'fuel',
        'color',
        'brand',
        'location',
        'image_path',
        'mileage',
        'doors',
        'number_of_seats',
        'price',
        'gearbox',
        'year',
    ];

    public function rent_application(){
        return $this->hasMany(rentApplication::class, 'car_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
