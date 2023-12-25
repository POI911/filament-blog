<?php

namespace App\Filament\App\Resources\PostResource\Pages;

use App\Filament\App\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPost extends ViewRecord
{
    protected static string $resource = PostResource::class;
    protected static ?string $title = 'View Post';
    protected static string $view = 'filament.app.resources.post-resource.pages.view-post';

}
