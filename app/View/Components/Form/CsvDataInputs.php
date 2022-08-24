<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class CsvDataInputs extends Component
{
    public $csvData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($csvData)
    {
        $this->csvData = $csvData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.csv-data-inputs');
    }
}
