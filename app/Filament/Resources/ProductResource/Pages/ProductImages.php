<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;
use PhpParser\Node\Stmt\For_;

class ProductImages extends EditRecord
{
    protected static string $resource = ProductResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Define the form schema for managing product images
                SpatieMediaLibraryFileUpload::make('images')
                    ->image()
                    ->collection('product_images')
                    ->multiple()
                    ->label('Product Images')
                    ->panelLabel('grid')
                    ->enableReordering()
                    ->reorderable() 
                    ->openable()
                    ->deletable()
                    ->preserveFilenames(),

            ]);
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
