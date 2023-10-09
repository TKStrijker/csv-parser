<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;
use App\Models\Csv;

class CsvUpdateController extends Controller
{
    /**
     * @method PUT
     * @route v1/csvs/{id}
     * @since 1.0
     */
    public function update(CsvRequest $request, int $id)
    {
        $csv = Csv::findOrFail($id);

        $this->authorize('update', $csv);

        $csv->update($request->validated());

        return redirect()->route('csvs/show', $csv);
    }
}