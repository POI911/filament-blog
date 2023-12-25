<x-filament-panels::page>



    <link href='{{ asset('posts/posts.css') }}' rel='stylesheet' type='text/css'>

    <div >

        <div class="card">
          <div class="user">
            <div class="profile">
              <img src="https://placehold.co/50" alt="avatar" class="ava">
              <div class="username">
                <h3 class="name">{{ $this->record->user->name }}</h3>

              </div>
            </div>
            <i class="fa-brands fa-twitter icon"></i>
          </div>
          <div class="twitt">
            <p>{{ $this->record->content }}<span>

              </span>
            </p>
          </div>
          <div class="insight">

            <div class="created">
              <p>{{ $this->record->created_at }}</p>
            </div>
          </div>
        </div>
      </div>

    </x-filament-panels::page>

