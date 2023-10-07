<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Models\Csv;
use Illuminate\Http\Request;

class CsvEditController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs/{id}/edit
     * @since 1.0
     */
    public function edit(Request $request, int $id)
    {
        $csv = Csv::find(1);

        $this->authorize('update', $csv);

        return view('csv.edit', ['csv' => $csv]);
    }
}