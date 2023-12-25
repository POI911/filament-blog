<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
use App\Models\Comment;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListComments extends ListRecords
{
    protected static string $resource = CommentResource::class;


    public function getTabs(): array
{
    return [
        'All Comments' => Tab::make()
        ->badge(Comment::query()->count()),
        'Admin Comments' => Tab::make()
        ->badge(Comment::query()->where('user_id', auth()->user()->id)->count())
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id)),

    ];
}

}
