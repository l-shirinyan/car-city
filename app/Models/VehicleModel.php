<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class VehicleModel extends Model implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['brand.name', 'name']
            ]
        ];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function trims()
    {
        return $this->hasMany(Trim::class);
    }

    public function vehicles()
    {
        return $this->hasManyThrough(Vehicle::class, Trim::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('hero-thumb')
            ->width(200)
            ->format('webp');

        if (array_key_exists('width', $media->custom_properties) && array_key_exists('height', $media->custom_properties)) {
            $this
                ->addMediaConversion('model-media')
                ->width($media->custom_properties['width'])
                ->height($media->custom_properties['height'])
                ->withResponsiveImages()
                ->format('webp');
        } else {
            $this
                ->addMediaConversion('model-media')
                ->withResponsiveImages()
                ->format('webp');
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('model-media');
    }
}
