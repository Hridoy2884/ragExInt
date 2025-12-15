<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
Forms\Components\TextInput::make('name')
    ->required()
    ->maxLength(255)
    ->lazy() // important: updates only after losing focus or pressing enter
    ->afterStateUpdated(function ($state, callable $set, $get) {
        $currentSlug = $get('slug');
        $autoSlug = \Str::slug($state);

        // Only set slug if it's empty or matches previous auto-generated slug
        if (empty($currentSlug) || $currentSlug === \Str::slug($state)) {
            $set('slug', $autoSlug);
        }
    }),


            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

                Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('categories') // stores in storage/app/public/categories
                ->maxSize(1024) // 1MB max
                ->nullable(),


            Forms\Components\Toggle::make('status')
                ->label('Active')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->sortable(),
            
                Tables\Columns\ImageColumn::make('image')
        ->label('Category Image')
        ->rounded()
        ->width(60)
        ->height(60)
        ->toggleable() // optional: user can hide this column
        ->placeholder(url('/images/placeholder.png')), // optional placeholder if no image

                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('slug')->searchable(),
                
                    Tables\Columns\BooleanColumn::make('status')
        ->label('Active')
        ->sortable()
        ->trueIcon('heroicon-o-check-circle')
        ->falseIcon('heroicon-o-x-circle')
        ->colors([
            'success' => true,
            'danger' => false,
        ]),

                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y'),
      
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}




