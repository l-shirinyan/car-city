<?php

namespace App\Nova\Templates;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Extensions\Template;
use Laravel\Nova\Fields\Text;
use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Panel;

class PositionsIndex extends Template
{

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            new Panel('Header', [
                Text::make('Title', 'header_title')
                    ->required()
                    ->default('Looking for a car ?'),
                Text::make('Subtitle', 'header_subtitle')
                    ->required()
                    ->default('Car City have the widest range of brands and models to suit any budget'),
                Image::make('Background', 'header_background')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required')
            ]),

            new Panel('Middle side blocks', [
                Text::make('Left text', 'middle_left_text'),
                Image::make('Left Image', 'middle_left_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
                Text::make('Right text', 'middle_right_text'),
                Image::make('Right Image', 'middle_right_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required')
            ]),

            new Panel('Bottom text/img', [
                Text::make('Text', 'img_text_text'),
                Image::make('Image', 'img_text_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required')
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
