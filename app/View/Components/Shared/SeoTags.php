<?php

namespace App\View\Components\Shared;

use Illuminate\View\Component;

class SeoTags extends Component
{
    public $title;
    public $description;
    public $keywords;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = "", $description = "", $keywords = "")
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.seo-tags');
    }
}
