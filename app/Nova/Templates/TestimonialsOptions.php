<?php

namespace App\Nova\Templates;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Extensions\Template;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Markdown;
use Whitecube\NovaFlexibleContent\Flexible;

class TestimonialsOptions extends Template
{

    protected $jsonAttributes = ['testimonials'];


    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Text::make('Title'),
            Flexible::make('Testimonials')
                ->button('Add Testimonial')
                ->addLayout('Testimonial', 'home_testimonials', [
                    Date::make('Posted Date', 'posted_date')->resolveUsing(function ($value) {
                        return $value;
                    }),
                    Text::make('Name'),
                    Number::make('Rate')
                        ->min(0)
                        ->max(5),
                    Markdown::make('Content'),
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
