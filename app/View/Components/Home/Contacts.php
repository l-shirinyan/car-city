<?php

namespace App\View\Components\Home;

use Illuminate\View\Component;

class Contacts extends Component
{
    public $contacts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contacts = [
            [
                'title' => 'instagram',
                'path' => asset('/images/icons/soc-icons/c-insta-dark.svg'),
            ],
            [
                'title' => 'whatsapp',
                'path' => asset('/images/icons/soc-icons/c-whatsapp-dark.svg'),
            ],
            [
                'title' => 'facebook',
                'path' => asset('/images/icons/soc-icons/c-facebook-dark.svg'),
            ],
            [
                'title' => 'phone',
                'path' => asset('/images/icons/soc-icons/c-phone-dark.svg'),
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.contacts');
    }
}
