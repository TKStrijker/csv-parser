<?php

namespace App\Http\Controllers\CsvData;

use App\Http\Controllers\Controller;
use App\Models\CsvData;
use Illuminate\Http\Request;

class CsvDataDeleteController extends Controller
{
    /**
     * @method DESTROY
     * @route v1/data/{id}
     * @since 1.1
     */
    public function delete(Request $request, int $id)
    {
        $csvData = CsvData::with('csv')
            ->findOrFail($id);

        $this->authorize('update', $csvData->csv);
        $this->authorize('delete', $csvData);

        $csvData->delete();

        return redirect()->route('csvs/show', $csvData->csv_id);
    }
}
