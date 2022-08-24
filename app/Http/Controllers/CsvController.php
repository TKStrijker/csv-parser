<?php

namespace App\Http\Controllers;

use App\Exports\CsvExport;
use App\Http\Requests\CsvRequest;
use App\Imports\CsvsImport;
use App\Models\Csv;
use App\Models\CsvData;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Csv::class);

        $csvs = Csv::query()->where('user_id', auth()->id())->get();

        return view('csv.index', ['csvs' => $csvs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', $csv = new Csv);

        return view('csv.create', ['csv' => $csv]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CsvRequest $request)
    {
        $this->authorize('create', $csv = new Csv);

        $csv->fill($request->validated());
        $csv->save();

        $csv->user()->associate(auth()->user());
        $csv->save();

        Excel::import(new CsvsImport($csv->id), $request->validated()['file']);

        return redirect()->route('csvs.show', $csv);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Csv $csv)
    {
        $this->authorize('view', $csv);

        $csvData = CsvData::where('csv_id', $csv->id)->get();

        return view('csv.show', ['csvData' => $csvData, 'csv' => $csv]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Csv $csv)
    {
        $this->authorize('update', $csv);

        return view('csv.edit', ['csv' => $csv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CsvRequest $request, Csv $csv)
    {
        $this->authorize('update', $csv);

        $csv->update($request->validated());

        return redirect()->route('csvs.show', $csv);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Csv $csv
     * @return \Illuminate\Http\RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Csv $csv)
    {
        $this->authorize('delete', $csv);

        $csv->delete();

        return redirect()->route('csvs.index');
    }

    /**
     * @param Csv $csv
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function export(Csv $csv)
    {
        $this->authorize('export', $csv);

        return (new CsvExport($csv))->download();
    }
}
