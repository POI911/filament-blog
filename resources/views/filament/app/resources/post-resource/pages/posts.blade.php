<x-filament-panels::page>



    <link href='{{ asset('posts/posts.css') }}' rel='stylesheet' type='text/css'>

      <section id="postIndex" class="widthWrapper">

        @foreach ($this->records as $post)
        <article class="mb-4">

            <a  href="https://sitechop.com/posts/12-speeding-up-your-website">
                <span>Author: {{ $post->user->name }}</span>
              <h2>{{ $post->title }}</h2>
              <p>{{ $post->content }}</p>
            </a>

          </article>

        @endforeach


      </section>


    </x-filament-panels::page>

