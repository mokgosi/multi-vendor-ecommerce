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
        'inventory',
        'discount_percent',
        'featured',
        'reviewable',
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

                                                                                                                                                                                                                                                                                                                            