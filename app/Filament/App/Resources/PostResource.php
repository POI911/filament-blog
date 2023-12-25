<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\PostResource\Pages;
use App\Filament\App\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $modelLabel = 'My Posts';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = 1;
    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('title')
            ->maxLength(25)
            ->required(),

            Forms\Components\TextArea::make('content')
            ->required()
            ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                TextColumn::make('#')
                ->rowIndex(),

            TextColumn::make('title')
            ->label('Post Title'),

            TextColumn::make('content')
            ->label('Post Content')
            ->limit(30),

            TextColumn::make('created_at')
            ->dateTime('Y-m-d'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id))
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
            'index' => Pages\ListPosts::route('/my_posts'),
            'create' =>  Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
            'timeline' => Pages\Posts::route('/all_posts'),
            'view'  => Pages\ViewPost::route('/{record}/view')

        ];
    }
}
