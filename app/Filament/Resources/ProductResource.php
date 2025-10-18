<?php

namespace App\Filament\Resources;

use App\Enums\ProductStatusEnum;
use App\Enums\RolesEnum;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make()
                    ->schema([
                        TextInput::make('title')
                            ->live(onBlur: true) //Trigger the afterStateUpdated only when the user leaves the input field
                            ->required()
                            ->maxLength(255)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')->required()->maxLength(255),
                        TextInput::make('price')->required()->numeric(),
                        TextInput::make('cost_price')->required()->numeric(),
                        TextInput::make('inventory')->required()->integer(),
                        TextInput::make('discount_percent')->nullable()->numeric(),
                        TextInput::make('price_after_discount')->nullable()->numeric(),
                        TextInput::make('inventory')->required()->numeric(),
                        TextInput::make('thumbnail_url')->nullable()->maxLength(255),
                        TextInput::make('weight')->required()->numeric(),
                        TextInput::make('tax_rate')->required()->numeric(),
                        TextInput::make('security_stock')->required()->integer(),
                        TextInput::make('sku')->nullable()->maxLength(100),
                        TextInput::make('barcode')->nullable()->maxLength(100),
                        
                       

                        Select::make('status')
                            ->required()
                            ->options(ProductStatusEnum::labels())
                            ->default(ProductStatusEnum::Available->value),
                        Select::make('department_id')
                            ->relationship('department', 'name')
                            ->label('Department')
                            ->preload()
                            ->searchable()
                            ->reactive() //Make the field reactive to update category options based on department
                            ->required()
                            ->afterStateUpdated(fn (Set $set) => $set('category_id', null)), //Reset category when department changes
                        Select::make('category_id')
                            ->required()
                            ->relationship(
                                name :'category', 
                                titleAttribute: 'name',
                                modifyQueryUsing: function (Builder $query, callable $get) {
                                    $departmentId = $get('department_id');
                                    if ($departmentId) {
                                        return $query->where('department_id', $departmentId);
                                    }
                                    return $query;
                                })
                            ->label('Category')
                            ->preload()
                            ->searchable()
                            ->afterStateUpdated(fn (Set $set) => $set('category_id', null)), //Reset category when department changes
                            // ->reactive() //Make the field reactive to update options based on department
                            // ->options(function (callable $get) {
                            //     $departmentId = $get('department_id');
                            //     if ($departmentId) {
                            //         return \App\Models\Category::where('department_id', $departmentId)->pluck('name', 'id');
                            //     }
                            //     return \App\Models\Category::pluck('name', 'id');
                            // }),
                    ]),
                Forms\Components\RichEditor::make('description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpan('2')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                        'codeBlock',
                        'blockquote',
                        'redo',
                        'undo',
                        'h2',
                        'h3',
                        'table'
                    ]),

                Forms\Components\Toggle::make('is_active')->required()->default(true),
                Forms\Components\Toggle::make('is_returnable')->default(true),
                Forms\Components\Toggle::make('is_digital')->default(false),
                Forms\Components\Toggle::make('is_taxable')->default(true),
                Forms\Components\Toggle::make('is_shippable')->default(true),
                Forms\Components\Toggle::make('is_featured')->default(false),
                Forms\Components\Toggle::make('is_reviewable')->default(true),
                
                Forms\Components\RichEditor::make('details')
                    ->nullable()
                    ->maxLength(65535)
                    ->columnSpan('2')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'strike',
                        'bulletList',
                        'orderedList',
                        'link',
                        'codeBlock',
                        'blockquote',
                        'redo',
                        'undo',
                        'h2',
                        'h3',
                        'table'
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                    Tables\Columns\TextColumn::make('department.name')->label('Department')->sortable()->searchable(),
                    Tables\Columns\TextColumn::make('category.name')->label('Category')->sortable()->searchable(),
                    Tables\Columns\TextColumn::make('inventory')->sortable(),
                    Tables\Columns\TextColumn::make('price')->money('usd', true)->sortable(),
                // Tables\Columns\TextColumn::make('slug'),
                // Tables\Columns\TextColumn::make('discount_percent')->sortable()->label('Discount %'),
                // Tables\Columns\TextColumn::make('status')
                //     ->enum(ProductStatusEnum::labels())
                //     ->sortable()
                //     ->searchable(),
                // Tables\Columns\IconColumn::make('featured')->boolean()->sortable(),
                // Tables\Columns\IconColumn::make('reviewable')->boolean()->sortable(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->since()
                //     ->label('Created'),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->label('Last Updated'),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ProductStatusEnum::labels()),
                SelectFilter::make('department')->relationship('department', 'name'),
                SelectFilter::make('category')->relationship('category', 'name'),

                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function canViewAny(): bool
    {
        $user = Filament::auth()->user();
        return $user && $user->hasRole(RolesEnum::Vendor);
    }
}
