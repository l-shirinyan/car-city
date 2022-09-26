<?php

namespace App\Nova\Templates;

use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use App\Nova\Extensions\{Template, Flexible};

class ScheduleService extends Template
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
                    ->required(),
                Text::make('Subtitle', 'header_subtitle')
                    ->required(),
                Image::make('Background', 'header_background')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required')
            ]),

            new Panel('Why service your car with us ?', [
                Flexible::make('Why us')
                    ->button('Add a reason')
                    ->addLayout('why us', 'why_us', [
                        Text::make('Reason title'),
                        Text::make('Reason description')
                    ]),
            ]),

            new Panel('Starting prices', [
                Flexible::make('Starting prices')
                    ->button('Add a price')
                    ->addLayout('Starting prices', 'starting_prices', [
                        Text::make('Price'),
                        Markdown::make('Price description')
                    ]),
            ]),


            new Panel('Middle blocks', [
                Flexible::make('Middle blocks')
                    ->button('Add block')
                    ->addLayout('Middle blocks', 'missle_blocks', [
                        Text::make('Block title'),
                        Markdown::make('Block Description'),
                        Image::make('Block image', 'block_image')->conversionOnIndexView('thumb')
                            ->customPropertiesFields([
                                Text::make('Alt')
                            ])

                            ->rules('required')
                    ]),
            ]),

            Image::make('Bottom image full width')->conversionOnIndexView('thumb')
                ->customPropertiesFields([
                    Text::make('Alt')
                ])

                ->rules('required')

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
