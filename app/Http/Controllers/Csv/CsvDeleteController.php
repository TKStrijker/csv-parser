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
        $csv = Csv::find($id);

        $this->authorize('delete', $csv);

        $csv->delete();

        return redirect()->route('csvs/index');
    }

}