<x-filament-panels::page>


<head>
    <link href='{{ asset('posts/posts.css') }}' rel='stylesheet' type='text/css'>
</head>

        @foreach($this->records as $record)
        <a href="{{ route('filament.app.resources.posts.view' , ['record' => $record->id]) }}">
        <div >

          <div class="card">
            <div class="user">
              <div class="profile">
                <img src="https://placehold.co/50" alt="avatar" class="ava">
                <div class="username">
                  <h3 class="name">{{ $record->user->name }}</h3>

                </div>
              </div>
              <i class="fa-brands fa-twitter icon"></i>
            </div>
            <div class="twitt">
              <p>{{ $record->content }}<span>

                </span>
              </p>
            </div>
            <div class="insight">

              <div class="created">
                <p>{{ $record->created_at }}</p>
              </div>
            </div>
          </div>
        </div>
        </a>
          @endforeach



    </x-filament-panels::page>

