<?php

namespace App\Nova\Templates;

use Laravel\Nova\Fields\Text;
use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Panel;
use App\Nova\Extensions\{Template, Flexible};

class CarFinance extends Template
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

            new Panel('Sub Header', [
                Text::make('Title', 'subheader_title')
                    ->required(),
                Text::make('Subtitle', 'subheader_subtitle')
                    ->required(),
            ]),

            new Panel('Steps', [
                Flexible::make('Steps')
                    ->button('Add Step')
                    ->addLayout('Steps', 'steps', [
                        Text::make('Title', 'step_title'),
                        Markdown::make('Description', 'step_description'),
                    ]),
            ]),

            new Panel('Full width image', [
                Image::make('Full width image')->conversionOnIndexView('thumb')
                    ->customPropertiesFields([
                        Text::make('Alt')
                    ])

                    ->rules('required')
            ]),

            new Panel('Partners', [
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

            new Panel('Trending questions', [
                Flexible::make('Trending questions')
                    ->button('Add Question/Answer')
                    ->addLayout('Trending questions', 'trending_questions', [
                        Text::make('Question'),
                        Text::make('Answer'),
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
