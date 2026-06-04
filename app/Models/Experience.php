<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Experience extends Model
{
    use HasTranslations, SoftDeletes;

    protected $table = 'experience';

    protected $fillable = [
        'establishment',
        'title',
        'location',
        'employment_type',
        'start_date',
        'end_date',
        'technologies_used',
    ];

    public array $translatable = ['title'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
