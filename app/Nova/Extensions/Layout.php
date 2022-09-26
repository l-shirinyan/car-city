<?php

namespace App\Nova\Extensions;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Whitecube\NovaFlexibleContent\Layouts\Layout as LayoutsLayout;
use Whitecube\NovaPage\Sources\SourceInterface;

class Layout extends LayoutsLayout implements HasMedia
{
    use InteractsWithMedia;

    public function getSource(): SourceInterface
    {
        if (is_string($this->source) || is_null($this->source)) {
            $source = $this->source ?? config('novapage.default_source');
            $this->source = new $source;
            $this->source->setConfig(config('novapage.sources.' . $this->source->getName()) ?? []);
        }

        return $this->source;
    }

    protected function getMediaModel(): HasMedia
    {
        $model = $this->getSource()->getOriginal($this);

        if (is_null($model) || !($model instanceof HasMedia)) {
            throw new \Exception('Origin HasMedia model not found.');
        }

        return $model;
    }
}
