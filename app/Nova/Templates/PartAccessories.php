<?php

namespace App\Nova\Templates;

use Laravel\Nova\Fields\{Text, Markdown};
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use App\Nova\Extensions\{Template, Flexible};
use App\Nova\Extensions\ImageField as Image;

class PartAccessories extends Template
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
                Image::make('Background', 'header_background')
                    ->rules('required')
            ]),

            new Panel('Why chose us ?', [
                Flexible::make('Why us')
                    ->button('Add a reason')
                    ->addLayout('why us', 'why_us', [
                        Text::make('Reason title'),
                        Text::make('Reason description')
                    ]),
            ]),

            new Panel('Blocks Text/Image', [
                Text::make('Top block title', 'top_block_text'),
                Image::make('Top block image', 'top_block_image')
                    ->rules('required'),
                Markdown::make('Top block description', 'top_block_description'),
                Text::make('Bottom block title', 'bottom_block_text'),
                Image::make('Bottom block image', 'bottom_block_image')
                    ->rules('required'),
                Markdown::make('Bottom block description', 'bottom_block_description'),
            ]),

            new Panel('Lending Partners', [
                Flexible::make('Partners')
                    ->button('Add Partner')
                    ->addLayout('Partners', 'partners', [
                        Image::make('logo')->conversionOnIndexView('thumb')
                            ->customPropertiesFields([
                                Text::make('Alt')
                            ])

                            ->rules('required'),
                        Text::make('link')
                    ]),
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
