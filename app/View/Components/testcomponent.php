<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class testcomponent extends Component
{
    public $title, $users;
    /**
     * Create a new component instance.
     */
    public function __construct($title, $users)
    {
        $this->title=$title;
        $this->users = $users;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testcomponent');
    }
}
