<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'meta_title',
        'meta_description',
        'is_active',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
