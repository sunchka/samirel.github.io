<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'date',
        'description',
        'title_desc',
        'photo',
        'links',
    ];

    protected $appends = ['photo_url', 'formatted_date'];

    public function getPhotoUrlAttribute(): string
    {
        return asset('storage/'.$this->photo);
    }

    public function getFormattedDateAttribute()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        return Carbon::parse($this->date)->translatedFormat('d F Y');
    }

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'links' => 'array',
        ];
    }
}
