<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = auth()->id();

        // Ensure that price_after_discount is calculated if discount_percent is provided
        if (isset($data['discount_percent']) && isset($data['price'])) {
            $data['price_after_discount'] = $data['price'] - ($data['price'] * ($data['discount_percent'] / 100));
        }
        return $data;
    }

    // removed redundant redirect method since global redirect is set in AdminPanelProvider
    // public function getRedirectUrl(): string
    // {
    //     return $this->getResource()::getUrl('index'); 
    // }
}
