<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Models\Csv;

class CsvIndexController extends Controller
{
    /**
     * @method GET
     * @route v1/csvs
     * @since 1.0
     */
    public function index()
    {
        $this->authorize('viewAny', Csv::class);

        $csvs = Csv::query()->where('user_id', auth()->id())->get();

        return view('csv.index', ['csvs' => $csvs]);
    }
}