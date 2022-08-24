<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvDataRequest;
use App\Models\Csv;
use App\Models\CsvData;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class CsvDataController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function create(Csv $csv)
    {
        $this->authorize('create', $csvData = new CsvData);

        return view('csvdata.create', ['csvData' => $csvData, 'csv' => $csv]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(CsvDataRequest $request, Csv $csv)
    {
        $this->authorize('create', $csvData = new CsvData);

        $csvData->fill($request->validated());
        $csvData->year = Carbon::parse($request->date)->year;
        $csvData->week = Carbon::parse($request->date)->weekOfYear;
        $csvData->save();

        $csvData->csv()->associate($csv);
        $csvData->save();

        return redirect()->route('csvs.show', $csvData->csv);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CsvData $csvData
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     * @throws AuthorizationException
     */

    public function edit(Csv $csv, CsvData $data)
    {
        $this->authorize('update', $data);

        return view('csvdata.edit', ['csv' => $csv ,'csvData' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CsvDataRequest $request
     * @param CsvData $data
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(CsvDataRequest $request, Csv $csv, CsvData $data)
    {
        $this->authorize('update', $data);

        $data->update($request->validated());
        $data->update(['year' => Carbon::parse($request->date)->year]);
        $data->update(['week' => Carbon::parse($request->date)->weekOfYear]);

        return redirect()->route('csvs.show', $data->csv);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CsvData $data
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Csv $csv, CsvData $data)
    {
        $this->authorize('delete', $data);

        $data->delete();

        return redirect()->route('csvs.show', $csv);
    }
}
