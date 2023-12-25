<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


    public function getTabs(): array
    {
        return [
            'All Posts' => Tab::make()
            ->badge(Post::query()->count()),
            'Admin Posts' => Tab::make()
            ->badge(Post::query()->where('user_id', auth()->user()->id)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id)),
        ];
    }
}
