<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class Picture extends Component
{
    public $image;
    public $isWithScale;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($image, $isWithScale = false)
    {
        $this->image = $image;
        $this->isWithScale = $isWithScale;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.picture');
    }
}
