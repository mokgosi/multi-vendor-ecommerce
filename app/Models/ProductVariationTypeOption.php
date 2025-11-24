<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariationTypeOption extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariationTypeOptionFactory> */
    use HasFactory;
    
    protected $fillable = [
        'product_variation_type_id',
        'name',
    ];
    
    public function productVariationType(): BelongsTo
    {
        return $this->belongsTo(ProductVariationType::class);
    }
}
