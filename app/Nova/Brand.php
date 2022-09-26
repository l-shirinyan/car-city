<?php

namespace App\Nova;

use App\Nova\Extensions\ImageField as Image;
use Eminiarts\Tabs\Traits\HasTabs;
use Eminiarts\Tabs\{Tabs, Tab};
use Illuminate\Http\Request;
use Laravel\Nova\Fields\{HasMany, File, Heading, ID, Markdown, Text};
use Laravel\Nova\Http\Requests\NovaRequest;

use Timothyasp\Color\Color;

class Brand extends Resource
{

    use HasTabs;

    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Brand::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

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

            new Tabs('test', [
                'General information' => [
                    ID::make()->sortable(),
                    Text::make('Name')->sortable(),
                    Text::make('Slug')->readonly(),
                    Color::make('Color')->slider(),
                    Image::make('Brand Logo', 'brand_logo'),
                    Image::make('Brand Vehicle Icon', 'brand_vehicle_icon')->setDimensions(108, 88, false),
                ],

                'Home Brand' => [
                    Heading::make('Header'),
                    Text::make('Title', 'hero_title')->hideFromIndex(),
                    Text::make('Description', 'hero_description')->hideFromIndex(),
                    Image::make('Hero image', 'brand_hero_img')->hideFromIndex(),

                    Heading::make('Promoted Vehicle')->hideFromIndex(),
                    Text::make('Title', 'promoted_title')->hideFromIndex(),
                    Markdown::make('Description', 'promoted_description')->hideFromIndex(),
                    Text::make('Link to car', 'promoted_link')->hideFromIndex(),
                    Image::make('Image', 'brand_promoted_img')->setDimensions(762, 448),

                    Heading::make('Marketing section')->hideFromIndex(),
                    Text::make('Title', 'marketing_title')->hideFromIndex(),
                    Markdown::make('description', 'marketing_description'),
                    Image::make('Left image', 'brand_marketing_left_img')->setDimensions(529, 626)->hideFromIndex(),
                    Image::make('Right image', 'brand_marketing_right_img')->setDimensions(529, 626)->hideFromIndex(),

                    Heading::make('Full width bottom')->hideFromIndex(),
                    Text::make('Title', 'full_width_title')->hideFromIndex(),
                    Image::make('Image', 'full_width_img')->setDimensions(1368, 616)->hideFromIndex(),
                ],

                'Showroom' => [
                    Heading::make('Header')->hideFromIndex(),
                    Text::make('Title', 'showroom_title')->hideFromIndex(),
                    Text::make('Subtitle', 'showroom_subtitle')->hideFromIndex(),
                    Image::make('Showroom header background', 'showroom_header_bg')->setDimensions(2560, 1200)->hideFromIndex(),


                    Heading::make('Promoted Vehicle')->hideFromIndex(),
                    Text::make('Title', 'showroom_promoted_title')->hideFromIndex(),
                    Markdown::make('Description', 'showroom_promoted_description')->hideFromIndex(),
                    Text::make('Link to car', 'showroom_promoted_link')->hideFromIndex(),
                    Image::make('Image', 'showroom_promoted_img')->setDimensions(762, 448)->hideFromIndex(),


                    Heading::make('Full width video')->hideFromIndex(),
                    File::make('Video', 'showroom_video')->hideFromIndex(),
                ],
                HasMany::make('Vehicle Models')
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
