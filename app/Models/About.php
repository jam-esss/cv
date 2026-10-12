<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;

    protected $fillable = [
        'title',
        'description',
        'order',
    ];

    public array $translatable = ['title', 'description'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
