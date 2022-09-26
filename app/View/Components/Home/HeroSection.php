<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class HeroSection extends Component
{
    public $title;
    public $bgColor;
    public $description;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $bgColor = '#dfdfdf', $description = '')
    {
        $this->title = $title;
        $this->bgColor = $bgColor;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.hero-section');
    }
}
