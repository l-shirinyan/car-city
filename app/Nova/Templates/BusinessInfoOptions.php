<?php

namespace App\Nova\Templates;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Extensions\Template;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Whitecube\NovaFlexibleContent\Flexible;

class BusinessInfoOptions extends Template
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
            Number::make('Cars model available'),
            Number::make('Years in business'),
            Flexible::make('Contact')
                ->button('Add contact')
                ->addLayout('Contact', 'business_contact', [
                    Text::make("Title", "contact_title"),
                    Text::make("Address", "contact_address"),
                    Text::make("Email", "contact_email"),
                    Text::make("Week Opening", "contact_week_opening")->placeholder('Mon - Fri 09.00 AM - 05.00 PM'),
                    Text::make("WeekEnd Opening", "contact_week_end_popening")->placeholder('Sat - Sun Closed'),
                    Text::make("Phone number", "contact_phone_number"),
                ]),

            Flexible::make('Carcity Benefits')
                ->button('Add a benefit')
                ->addLayout('Why buy with us', 'benefits', [
                    Text::make('Benefit title'),
                    Text::make('Benefit description')
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

    protected $jsonAttributes = ['carcity_benefits'];
}
