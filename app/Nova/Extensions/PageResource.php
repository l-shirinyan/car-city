<?php

namespace App\Nova\Extensions;

use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaPage\Pages\PageResource as NovaPageResource;

class PageResource extends NovaPageResource
{
    protected function getBaseAttributeFields()
    {

        return
            [
                Text::make(__('Page title'), 'nova_page_title')
                    ->rules(['required', 'string', 'max:255']),
                DateTime::make(__('Page creation date'), 'nova_page_created_at')
                    ->rules(['required', 'string', 'max:255']),
                ...$this->resource->getStaticSEO()
            ];
    }
}
