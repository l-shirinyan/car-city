<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use \Znck\Eloquent\Traits\BelongsToThrough;

class Trim extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $casts =[
        'specs'=>'array'
    ];

    public function brand()
    {
        return $this->belongsToThrough(Brand::class, VehicleModel::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
