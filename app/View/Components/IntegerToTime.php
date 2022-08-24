<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IntegerToTime extends Component
{
    public $time;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($time)
    {
        $this->time = str_replace('.', ',', $time / 60);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.integer-to-time');
    }
}
