<?php

namespace App\Exports;

use App\Models\Csv;
use App\Models\CsvData;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class CsvExport implements FromQuery, WithHeadings, WithMapping, WithCustomCsvSettings
{
    use Exportable;

    private $fileName;

    private $writerType = Excel::CSV;

    private $headers = [
        'Content-Type' => 'text/csv'
    ];

    public function __construct(Csv $csv)
    {
        $this->fileName = $csv->file_name . '.csv';
        $this->csv_id = $csv->id;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';',
            'enclosure' => ''
        ];
    }

    public function headings(): array
    {
        return [
            'Boekjaar',
            'Week',
            'Datum',
            'Persnr',
            'Uren',
            'Uurcode',
        ];
    }

    public function map($row): array
    {
        return [
            $row->year,
            $row->week,
            Carbon::parse($row->date)->format('d/m/Y'),
            $row->personal_number,
            $row->hours / 60,
            $row->hour_code
        ];
    }

    /**
    * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return CsvData::query()->where('csv_id', $this->csv_id);
    }
}
