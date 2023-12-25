<x-filament-panels::page>



    <link href='{{ asset('posts/posts.css') }}' rel='stylesheet' type='text/css'>

      <section id="postIndex" class="widthWrapper">


        <article class="mb-4">

            <a>
            <span>Author: {{ $this->record->user->name }}</span>
              <h2>{{ $this->record->title }}</h2>
              <p>{{ $this->record->content }}</p>
            </a>
          </article>

          <ul>
            @foreach($this->record->comments as $comment)
            <li>{{ $comment->user->name }}: {{$comment->text }} </li>
            @endforeach
          </ul>


      </section>

    </x-filament-panels::page>

