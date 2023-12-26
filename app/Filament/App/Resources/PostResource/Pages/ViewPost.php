<?php

namespace App\Filament\App\Resources\PostResource\Pages;

use App\Filament\App\Resources\PostResource;
use App\Models\Comment;
use App\Models\Post;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;
    protected static ?string $title = 'View Post';
    protected static string $view = 'filament.app.resources.post-resource.pages.view-post';





    public function writeComment()
{
    return Actions\CreateAction::make('writeComment')
        ->model(Comment::class)
        ->label('New Comment')
        ->mutateFormDataUsing(function (array $data): array {
            $data['user_id'] = auth()->id();
            $data['post_id'] = $this->record->id;

            return $data;
        })
        ->form([
            Forms\Components\TextArea::make('text')
            ->required()
            ->maxLength(150),


        ])
        ->createAnother(false)
        ->using(function (array $data, string $model): Model {
            return $model::create($data);
        });
}
}
