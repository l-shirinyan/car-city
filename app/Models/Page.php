<?php

namespace App\Models;

use Whitecube\NovaPage\Sources\StaticPage;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Page extends StaticPage implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(200)
            ->format('webp');

        if (array_key_exists('width', $media->custom_properties) && array_key_exists('height', $media->custom_properties)) {
            $this
                ->addMediaConversion('image')
                ->width($media->custom_properties['width'])
                ->height($media->custom_properties['height'])
                ->withResponsiveImages()
                ->format('webp');
        } else {
            $this
                ->addMediaConversion('image')
                ->withResponsiveImages()
                ->format('webp');
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('media');
    }
}
