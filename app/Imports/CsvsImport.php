<?php

namespace App\Imports;

use App\Models\CsvData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CsvsImport implements ToModel, WithHeadingRow // todo sort use
{
    private $csv_id;

    public function __construct($csv_id)
    {
        $this->csv_id = $csv_id;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) // todo translate headings // todo check if headings are even needed
    {
        return new CsvData([
            'csv_id' => $this->csv_id,
            'year' => $row['boekjaar'],
            'week' => $row['week'],
            'date' => Carbon::parse($row['datum'])->format('Y-d-m'),
            'personal_number' => $row['persnr'],
            'hours' => $row['uren'],
            'hour_code' => $row['uurcode']
        ]);
    }
}
