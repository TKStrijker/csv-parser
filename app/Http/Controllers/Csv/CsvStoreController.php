<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Http\Requests\CsvRequest;
use App\Imports\CsvsImport;
use App\Models\Csv;
use Maatwebsite\Excel\Facades\Excel;

class CsvStoreController extends Controller
{
    /**
     * @method POST
     * @route v1/csvs
     * @since 1.0
     */
    public function store(CsvRequest $request)
    { 
        $this->authorize('create', $csv = new Csv());

        $csv->fill($request->validated());
        $csv->save();

        $csv->user()->associate(auth()->user());
        $csv->save();

        Excel::import(new CsvsImport($csv->id), $request->validated()['file']);

        return redirect()->route('csvs/show', $csv);
    }
}