<?php

namespace App\Nova\Templates;

use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Whitecube\NovaFlexibleContent\Flexible;
use App\Nova\Extensions\Template;

class OurServicesOptions extends Template
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
            Flexible::make('Our services')
                ->button('Add service')
                ->addLayout('Our services', 'our_services', [
                    Text::make('Service title'),
                    Image::make('Service image')->conversionOnIndexView('thumb')
                        ->customPropertiesFields([
                            Text::make('Alt')
                        ])

                        ->rules('required')
                ])
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
