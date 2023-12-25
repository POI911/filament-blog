<?php

namespace App\Filament\App\Resources\PostResource\Pages;

use App\Filament\App\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
class ListPosts extends ListRecords
{
    protected static string $resource = PostResource::class;




    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
            ->label('New Post')
        ];
    }




}
