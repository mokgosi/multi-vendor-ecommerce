<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        
        // Ensure that price_after_discount is calculated if discount_percent is provided
        if (isset($data['discount_percent']) && isset($data['price'])) {
            $data['price_after_discount'] = $data['price'] - ($data['price'] * ($data['discount_percent'] / 100));
        }

        $data['created_by'] = auth()->id();
        $data['updated_by'] = auth()->id();

        $data = parent::mutateFormDataBeforeCreate($data);

        return $data;
    }
}
