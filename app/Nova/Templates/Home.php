<?php

namespace App\Nova\Templates;

use App\Nova\Extensions\ImageField as Image;
use App\Nova\Extensions\Template;

use Laravel\Nova\Fields\{Markdown, Text};
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use Timothyasp\Color\Color;


class Home extends Template
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
                Text::make('Title', 'hero_section_title')
                    ->default('Looking for a car ?'),
                Text::make('Description', 'hero_section_description')
                    ->default('Car City have the widest range of brands and models to suit any budget'),
                Color::make('Background Color', 'hero_section_bg')->slider(),
                Image::make('Image', 'hero_section_image')
                    ->setDimensions(800, 500, false)
            ]),

            new Panel('Promoted Vehicule', [
                Text::make('Text', 'promoted_vehicule_text'),
                Markdown::make('Description', 'promoted_vehicule_description'),
                Text::make('Link', 'promoted_vehicule_link'),
                Image::make('Image', 'promoted_vehicule_image')
                    ->setDimensions(800, 500)
            ]),

            new Panel('Business section', [
                Text::make('Left text', 'business_left_text'),
                Image::make('Left Image', 'business_left_image')->setDimensions(771, 822),
                Text::make('Right text', 'business_right_text'),
                Image::make('Right Image', 'business_right_image')->setDimensions(768, 819),
                Text::make('Learn more link', 'business_learn_more_link')->help('ex: https://mywebsite.com'),

            ]),

            new Panel('Bottom section', [
                Text::make('Text', 'img_text_text'),
                Image::make('Image', 'img_text_image')->setDimensions(2560, 1200)
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
