<?php

namespace App\Nova\Extensions;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;
use Laravel\Nova\Fields\Text;

class ImageField extends Images
{

    public function __construct($name, $attribute = null, callable $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->customPropertiesFields([
            Text::make('alt')
        ]);
    }


    public function setDimensions($width, $height, $mustCrop = true)
    {
        if ($mustCrop) {
            return $this->customProperties([
                'width' => $width,
                'height' => $height
            ])->mustCrop()->croppingConfigs(['aspectRatio' => $width / $height]);
        } else {
            return $this->customProperties([
                'width' => $width,
                'height' => $height
            ]);
        }
    }
}
