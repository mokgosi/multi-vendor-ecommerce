<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory, InteractsWithMedia;

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

    public function productVariationTypes(): HasMany
    {
        return $this->hasMany(ProductVariationType::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    #[Scope]
    protected function active($query)
    {
        return $query->where('is_active', true);
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(150)
            ->height(150)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('medium')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('large')
            ->width(600)
            ->height(600)
            ->sharpen(10)
            ->nonQueued();
    }
}

                                                                                                                                                                                                                                                                                                                            