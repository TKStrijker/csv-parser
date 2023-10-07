<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    use HasFactory;

    protected $relations = [
        'data',
    ];

    protected $fillable = [
        'file_name',
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($csv) {
            $csv->data()->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function data()
    {
        return $this->hasMany(CsvData::class);
    }
}
