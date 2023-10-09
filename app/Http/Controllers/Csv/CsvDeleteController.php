<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Models\Csv;
use Illuminate\Http\Request;

class CsvDeleteController extends Controller
{
    /**
     * @method DELETE
     * @route v1/csvs/{id}
     * @since 1.0
     */
    public function delete(Request $request, int $id)
    {
        $csv = Csv::findOrFail($id);

        $this->authorize('delete', $csv);

        // delete all related CsvData models, check if this should be done before or after

        $csv->delete();

        return redirect()->route('csvs/index');
    }

}