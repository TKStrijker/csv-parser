<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csv extends Model // todo read up on model conventions
{
    use HasFactory;

    protected $fillable = [
        'file_name',
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($csv) { // todo delete all associated CsvData
            $csv->data()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function data() // todo rename
    {
        return $this->hasMany(CsvData::class);
    }
}
