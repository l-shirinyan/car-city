<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Brand extends Model implements HasMedia
{
    use Sluggable;
    use HasFactory;
    use InteractsWithMedia;
    use HasRelationships;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function vehicleModels()
    {
        return $this->hasMany(VehicleModel::class);
    }

    public function trims()
    {
        return $this->hasManyThrough(Trim::class, VehicleModel::class);
    }

    public function vehicles()
    {
        return $this->hasManyDeep(Vehicle::class, [VehicleModel::class, Trim::class]);
    }



    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('hero-thumb')
            ->width(200)
            ->format('webp');

        if (array_key_exists('width', $media->custom_properties) && array_key_exists('height', $media->custom_properties)) {
            $this
                ->addMediaConversion('brand-media')
                ->width($media->custom_properties['width'])
                ->height($media->custom_properties['height'])
                ->withResponsiveImages()
                ->format('webp');
        } else {
            $this
                ->addMediaConversion('brand-media')
                ->withResponsiveImages()
                ->format('webp');
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('brand-media');
    }
}
