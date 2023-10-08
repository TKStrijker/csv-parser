<?php

namespace App\Http\Controllers\CsvData;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvDataRequest;
use App\Models\Csv;
use App\Models\CsvData;
use Carbon\Carbon;

class CsvDataStoreController extends Controller
{
    /**
     * @method POST
     * @route v1/csvs/{id}/data
     * @since 1.0
     */
    public function store(CsvDataRequest $request, int $id)
    {
        $csv = Csv::findOrFail($id);

        $this->authorize('update', $csv);
        $this->authorize('create', $csvData = new CsvData);

        $csvData->fill($request->validated());
        $csvData->year = Carbon::parse($request->date)->year;
        $csvData->week = Carbon::parse($request->date)->weekOfYear;
        $csvData->csv_id = $csv->id;
        $csvData->save();

        return redirect()->route('csvs/show', $csvData->csv_id);
    }
}