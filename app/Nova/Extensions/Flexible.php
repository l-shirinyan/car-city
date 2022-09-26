<?php

namespace App\Nova\Extensions;

use Whitecube\NovaFlexibleContent\Flexible as NovaFlexibleContentFlexible;
use App\Nova\Extensions\Layout;
use Whitecube\NovaFlexibleContent\Layouts\LayoutInterface;

class Flexible extends NovaFlexibleContentFlexible
{

    public function addLayout(...$arguments)
    {

        $count = count($arguments);

        if ($count > 1) {
            $this->registerLayout(new Layout(...$arguments));
            return $this;
        }

        $layout = $arguments[0];

        if (is_string($layout) && is_a($layout, LayoutInterface::class, true)) {
            $layout = new $layout();
        }

        if (!($layout instanceof LayoutInterface)) {
            throw new \Exception('Layout Class "' . get_class($layout) . '" does not implement LayoutInterface.');
        }

        $this->registerLayout($layout);

        return $this;
    }
}
