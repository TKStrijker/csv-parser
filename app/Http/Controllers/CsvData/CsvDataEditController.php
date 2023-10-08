<?php

namespace App\Http\Controllers\CsvData;

use App\Http\Controllers\Controller;
use App\Models\CsvData;
use Illuminate\Http\Request;

class CsvDataEditController extends Controller
{
    /**
     * @route v1/data/{id}/edit
     * @method GET
     * @since 1.1
     */
    public function edit(Request $request, int $id)
    {
        $csvData = CsvData::with('csv') 
            ->findOrFail($id);

        $this->authorize('update', $csvData);
        $this->authorize('update', $csvData);

        return view('csvdata.edit', ['csv' => $csvData->csv ,'csvData' => $csvData]);
    }
}