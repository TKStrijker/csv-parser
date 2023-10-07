<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Models\Csv;
use Illuminate\Http\Request;

class CsvShowController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs/{id}
     * @since 1.0
     */
    public function show(Request $request, int $id)
    {
        $csv = Csv::with('data')
            ->find($id);

        $this->authorize('view', $csv);

        return view('csv.show', ['csv' => $csv]);
    }
}