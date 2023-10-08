<?php

namespace App\Http\Controllers\CsvData;

use App\Http\Controllers\Controller;
use App\Models\Csv;
use App\Models\CsvData;
use Illuminate\Http\Request;

class CsvDataCreateController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs/{id}/data/create
     * @since 1.0
     */
    public function create(Request $request, int $id)
    {
        $csv = Csv::findOrFail($id);

        $this->authorize('update', $csv);
        $this->authorize('create', $csvData = new CsvData);

        return view('csvdata.create', ['csvData' => $csvData, 'csv' => $csv]);
    }
}