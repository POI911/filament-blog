<?php

namespace App\Filament\Resources\CommentResource\Pages;

use App\Filament\Resources\CommentResource;
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
        'All Comments' => Tab::make(),
        'Admin Comments' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('user_id', auth()->user()->id)),

    ];
}

}
