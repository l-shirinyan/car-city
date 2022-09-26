<?php

namespace App\Nova\Templates;

use App\Nova\Extensions\Flexible;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaPage\Pages\Template;

class VideoCarouselOptions extends Template {

    protected $jsonAttributes = ['video_elements'];
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Flexible::make('Video Elements')
            ->button('Add a video')
            ->addLayout('Carousel', 'videos_carousel', [
                Text::make('Title'),
                Text::make('Subtitle'),
                File::make('Video')
            ]),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }
}
