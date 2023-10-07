<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Models\Csv;

class CsvCreateController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs/create
     * @since 1.0
     */
    public function create()
    {
        $this->authorize('create', $csv = new Csv());

        return view('csv.create', ['csv' => $csv]);
    }
}