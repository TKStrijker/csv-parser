<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsvData extends Model
{
    use HasFactory;

    protected $relations = [
        'csv',
    ];

    protected $fillable = [
        'csv_id',
        'year',
        'week',
        'date',
        'personal_number',
        'hours',
        'hour_code',
    ];

    public function csv()
    {
        return $this->belongsTo(Csv::class);
    }

    public function setHoursAttribute($value)
    {
        $this->attributes['hours'] = (float) str_replace(',', '.', $value) * 60;
    }
}
