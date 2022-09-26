<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Znck\Eloquent\Traits\BelongsToThrough;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Vehicle extends Model implements HasMedia
{
    use HasFactory;
    use BelongsToThrough;
    use InteractsWithMedia;

    protected $fillable = ['slug'];
    protected $appends = ['card', 'name'];

    public function brand()
    {
        return $this->belongsToThrough(Brand::class, [VehicleModel::class, Trim::class]);
    }

    public function vehicleModel()
    {
        return $this->belongsToThrough(VehicleModel::class, Trim::class);
    }

    public function trim()
    {
        return $this->belongsTo(Trim::class);
    }


    public function updateSlug()
    {
        $modelName = $this->vehicleModel->name;
        $vehicleYear = $this->year;
        $brandName = $this->brand->name;
        $slug = Str::slug($brandName . ' ' . $modelName . ' ' . $vehicleYear . ' ' . $this->id, '-');
        $this->slug = $slug;
        $this->saveQuietly();
    }


    // SCOPES

    public function scopeFeatured($query)
    {
        return $query->where('status', 'Featured');
    }


    // Attributes

    public function getNameAttribute()
    {
        return  $this->brand->name . " " . $this->vehicleModel->name;
    }

    public function getCardAttribute()
    {
        $firstMedia = $this->getFirstMedia('pictures');
        return [
            "name" => $this->name,
            "price" => number_format($this->price),
            "price_per_month" => number_format($this->price_per_month),
            "info" => implode(" - ", array_filter([$this->year, $this->trim->engine, $this->vehicleModel->body_type, $this->nb_doors ? $this->nb_doors . " dr" : null])),
            "status" => $this->status,
            "picture" => $firstMedia ? $firstMedia->getSrcset('vehicle-media') : "/",
            "car_url" => "/" . $this->brand->slug . "/" . $this->slug
        ];
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('hero-thumb')
            ->width(200)
            ->format('webp');

        if (array_key_exists('width', $media->custom_properties) && array_key_exists('height', $media->custom_properties)) {
            $this
                ->addMediaConversion('vehicle-media')
                ->width($media->custom_properties['width'])
                ->height($media->custom_properties['height'])
                ->withResponsiveImages()
                ->format('webp');
        } else {
            $this
                ->addMediaConversion('vehicle-media')
                ->withResponsiveImages()
                ->format('webp');
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('vehicle-media');
    }

}
