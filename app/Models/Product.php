<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'details',
        'thumbnail_url',
        'price',
        'cost_price',
        'tax_rate',
        'inventory',
        'discount_percent',
        'is_featured',
        'is_reviewable',
        'is_returnable',
        'is_digital',
        'is_taxable',
        'is_shippable', 
        'is_active',
        'status',
        'created_by',
        'updated_by',                                        
        'department_id',
        'category_id',
    ];

    public function department(): BelongsTo
    {                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
        return $this->belongsTo(Department::class);
    }
                                        
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

                                                                                                                                                                                                                                                                                                                            