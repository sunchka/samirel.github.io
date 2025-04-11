<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $slug = 'products';

    protected static ?string $navigationLabel = 'Товары';
    protected static ?string $pluralLabel = 'Товары';
    protected static ?string $label = 'Товары';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Название')
                    ->required(),

                TextInput::make('weight')
                    ->label('Вес')
                    ->required()
                    ->numeric(),

                TextInput::make('temp_max')
                    ->label('Макс. температура')
                    ->required(),

                TextInput::make('temp_min')
                    ->label('Мин. температура')
                    ->required(),

                TextInput::make('shelf_life')
                    ->label('Срок годности')
                    ->required()
                    ->integer(),

                TextInput::make('quantity_big')
                    ->label('Кол-во больших упаковок')
                    ->integer(),

                TextInput::make('quantity_medium')
                    ->label('Кол-во средних упаковок')
                    ->integer(),

                TextInput::make('quantity_small')
                    ->label('Кол-во маленьких упаковок')
                    ->integer(),

                Select::make('categories')
                    ->label('Категории')
                    ->relationship('categories', 'title')
                    ->preload()
                    ->searchable()
                    ->multiple(),

                Select::make('tags')
                    ->label('Теги')
                    ->relationship('tags', 'title')
                    ->preload()
                    ->searchable()
                    ->multiple(),

                FileUpload::make('photo')
                    ->label('Фото')
                    ->image(),

                Placeholder::make('created_at')
                    ->label('Создано')
                    ->content(fn(?Product $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label('Изменено')
                    ->content(fn(?Product $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Название')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('weight')
                    ->label('Вес'),

                TextColumn::make('temp_max')
                    ->label('Макс. температура'),

                TextColumn::make('temp_min')
                    ->label('Мин. температура'),

                TextColumn::make('shelf_life')
                    ->label('Срок годности'),

                TextColumn::make('quantity_big')
                    ->label('Кол-во больших упаковок'),

                TextColumn::make('quantity_medium')
                    ->label('Кол-во средних упаковок'),

                TextColumn::make('quantity_small')
                    ->label('Кол-во маленьких упаковок'),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title'];
    }
}
