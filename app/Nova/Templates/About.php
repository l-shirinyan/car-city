<?php

namespace App\Nova\Templates;

use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Extensions\Template;
use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Panel;
use Whitecube\NovaFlexibleContent\Flexible;

class About extends Template
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
                    ->rules('required'),
            ]),

            new Panel('Sub Header', [
                Text::make('Title', 'subheader_title')
                    ->required(),
                Text::make('Subtitle', 'subheader_subtitle')
                    ->required(),
            ]),

            new Panel('Full width image', [
                Image::make('Full width image', 'full_width_image_1')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
            ]),

            new Panel('1/ Side to side image/text', [
                Text::make('Left text', 'sts_left_text'),
                Image::make('Left Image', 'sts_left_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
                Text::make('Right text', 'sts_right_text'),
                Image::make('Right Image', 'sts_right_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
            ]),

            new Panel('Our mission', [
                Text::make('Title', 'mission_title')
                    ->required(),
                Text::make('Subtitle', 'mission_subtitle')
                    ->required(),
            ]),

            new Panel('Full width image', [
                Image::make('Full width image', 'full_width_image_2')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
            ]),

            new Panel('2/ Side to side image/text', [
                Text::make('Left text', 'sts_2_left_text'),
                Image::make('Left Image', 'sts_2_left_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
                Text::make('Right text', 'sts_2_right_text'),
                Image::make('Right Image', 'sts_2_right_image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
            ]),

            new Panel('Our story', [
                Flexible::make('Our story')
                    ->button('Add date')
                    ->addLayout('Story date', 'story_date', [
                        Number::make('year'),
                        Markdown::make('Description', 'story_description')
                    ]),
            ]),

            new Panel('Bottom section', [
                Text::make('Title'),
                Markdown::make('Description'),
                Image::make('Image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
            ]),

            new Panel('Join our team', [
                Text::make('Title'),
                Image::make('Background image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required'),
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
