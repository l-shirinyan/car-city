<?php

namespace App\Nova\Extensions;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\MediaLibrary\MediaCollections\{FileAdder, FileAdderFactory};
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Whitecube\NovaPage\Pages\Template as NovaPageTemplate;

abstract class Template extends NovaPageTemplate implements HasMedia
{
    public $hasStaticSEO = true;

    use InteractsWithMedia;

    protected function getMediaModel(): HasMedia
    {
        $model = $this->getSource()->getOriginal($this);

        if (is_null($model) || !($model instanceof HasMedia)) {
            throw new \Exception('Origin HasMedia model not found.');
        }

        return $model;
    }

    public function getMedia(string $collectionName = 'default', array|callable $filters = []): MediaCollection
    {
        return $this->getMediaRepository()
            ->getCollection($this->getMediaModel(), $collectionName, $filters)
            ->collectionName($collectionName);
    }


    public function addMedia(string|UploadedFile $file): FileAdder
    {
        return app(FileAdderFactory::class)->create($this->getMediaModel(), $file);
    }

    public function getStaticSEO()
    {
        if ($this->hasStaticSEO) {
            return [
                new Panel('SEO', [
                    Text::make(__('SEO title'), 'seo_title'),
                    Text::make(__('SEO description'), 'seo_description'),
                    Text::make(__('SEO keywords'), 'seo_keywords'),
                ])
            ];
        }

        return [];
    }
}
