<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariationType extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariationTypeFactory> */
    use HasFactory;

    public function options(): HasMany
    {
        return $this->hasMany(ProductVariationTypeOption::class);
    }
}
