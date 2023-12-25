<?php

namespace App\Filament\App\Resources\PostResource\Pages;

use App\Filament\App\Resources\PostResource;
use App\Models\Post;
use Filament\Resources\Pages\Page;

class Posts extends Page
{
    protected static string $resource = PostResource::class;

    protected static string $view = 'filament.app.resources.post-resource.pages.posts';

    public $records;

    public function mount(): void
{
    $this->records = Post::get();
}
}
