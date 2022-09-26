<?php

namespace App\Nova\Templates;

use App\Nova\Extensions\ImageField as Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Extensions\Template;

class BottomSectionOptions extends Template {

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Image::make('Bottom Certified Service image','certified_service')->setDimensions(529,674),
            Image::make('Bottom Parts image','parts')->setDimensions(436,280),
            Image::make('Bottom Bodyshop image','bodyshop')->setDimensions(436,280),
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
