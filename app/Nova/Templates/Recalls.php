<?php

namespace App\Nova\Templates;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use App\Nova\Extensions\Template;
use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Fields\Markdown;

class Recalls extends Template
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

            new Panel('Important information', [
                Text::make('Title', 'important_title')
                    ->required()
                    ->default('Looking for a car ?'),
                Markdown::make('Subtitle', 'important_description')
                    ->required()
                    ->default('Car City have the widest range of brands and models to suit any budget'),
                Image::make('Background', 'important_background')->conversionOnIndexView('thumb')
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
