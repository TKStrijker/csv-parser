<?php

namespace App\Http\Controllers\Csv;

use App\Exports\CsvExport;
use App\Http\Controllers\Controller;
use App\Models\Csv;
use Illuminate\Http\Request;

class CsvExportController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs/{id}/export
     * @since 1.0
     */
    public function export(Request $request, int $id)
    {
        $csv = Csv::find($id);

        $this->authorize('export', $csv);

        return (new CsvExport($csv))->download();
    }
}