<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Filament\Resources\CommentResource\RelationManagers;
use App\Models\Comment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextArea;
use App\Models\Post;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-m-chat-bubble-left';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    { // admin can create a comment on any post from his dashboard for now.
        return $form
            ->schema([


                Select::make('post_id')
                ->label('Choose Post')
                ->options(Post::all()->pluck('title', 'id'))
                ->searchable()
                ->required(),

                TextArea::make('text')
                ->label('Comment')
                ->required()
                ->maxLength(100),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('#')
                ->rowIndex(),

                TextColumn::make('post.title')
                ->label('Post Title'),

                TextColumn::make('text')
                ->label('Comment'),

                TextColumn::make('user.name')
                ->label('Owner'),

                TextColumn::make('created_at')
                ->dateTime('Y-m-d')


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
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }
}
