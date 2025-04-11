<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'title',
        'weight',
        'temp_max',
        'temp_min',
        'shelf_life',
        'quantity_big',
        'quantity_medium',
        'quantity_small',
        'photo',
        'text'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function getPhotoUrlAttribute(): string
    {
        return asset('storage/'.$this->photo);
    }

    protected function casts(): array
    {
        return [
            'weight' => 'float',
        ];
    }
}
