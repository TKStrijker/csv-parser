<?php

namespace App\Http\Controllers\CsvData;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvDataRequest;
use App\Models\CsvData;
use Carbon\Carbon;

class CsvDataUpdateController extends Controller
{
    /**
     * @method PUT
     * @route v1/data/{id}
     * @since 1.1
     */

     public function update(CsvDataRequest $request, int $id)
     {
         $csvData = CsvData::with('csv')
            ->findOrFail($id);

         $this->authorize('update', $csvData->csv);      
         $this->authorize('update', $csvData);

         $csvData->update($request->validated());
         $csvData->update(['year' => Carbon::parse($request->date)->year]);
         $csvData->update(['week' => Carbon::parse($request->date)->weekOfYear]);

         return redirect()->route('csvs/show', $csvData->csv_id);
     }
}