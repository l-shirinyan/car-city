<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class PromotedSection extends Component
{
    public $text;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($text = 'Looking for a car?', $description = '')
    {
        $this->text = $text;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.promoted-section');
    }
}
