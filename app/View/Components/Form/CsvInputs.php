<?php

namespace App\View\Components\Form;

use App\Models\Csv;
use Illuminate\View\Component;

class CsvInputs extends Component
{
    public $csv;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Csv $csv)
    {
        $this->csv = $csv;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.csv-inputs');
    }
}
