<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    use HasFactory;

    // todo refactor the csv_id thing(?)

    protected $fillable = [
        'csv_id',
        'year',
        'week',
        'date',
        'personal_number',
        'hours',
        'hour_code',
    ];

    // todo cast date as a date(?)

    public function csv()
    {
        return $this->belongsTo(Csv::class);
    }

    public function setHoursAttribute($value)
    {
        $this->attributes['hours'] = (float) str_replace(',', '.', $value) * 60;
    }
}
