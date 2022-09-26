<?php

namespace App\Nova;


use App\Nova\Extensions\ImageField;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Outl1ne\NovaSimpleRepeatable\SimpleRepeatable;
use Whitecube\NovaFlexibleContent\Flexible;

class Trim extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Trim::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            HasMany::make('Vehicles'),
            BelongsTo::make('Vehicle model'),
            Text::make('Engine')->help('in liters, put 1.6 for 1.6L'),
            Number::make('Carbon Emission'),
            Number::make('Fuel Consumption')->help('ex: 45MPG'),
            Text::make('Transmission'),

            Heading::make('Specifications'),
            SimpleRepeatable::make('Exterior specs.', 'specs->exterior', [
                Text::make('Specification'),
            ]),
            SimpleRepeatable::make('Entertainment specs.', 'specs->entertainement', [
                Text::make('Specification'),
            ]),
            SimpleRepeatable::make('Passive Safety specs.', 'specs->passive_safety', [
                Text::make('Specification'),
            ]),
            SimpleRepeatable::make('Security specs.', 'specs->security', [
                Text::make('Specification'),
            ]),
            SimpleRepeatable::make('Interior specs.', 'specs->interior', [
                Text::make('Specification'),
            ]),
            SimpleRepeatable::make('Driver Convenience specs.', 'specs->driver_convenience', [
                Text::make('Specification'),
            ]),

            // Heading::make('Key Features'),
            // Flexible::make('Key Features')
            // ->button('Add Key feature')
            // ->addLayout('Feature','feature',[
            //     Text::make('Title'),
            //     ImageField::make('key_feature')->setDimensions(1462,740)
            // ])




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

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
