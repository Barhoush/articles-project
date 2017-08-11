@extends('layouts.home')
@section('content')
    <blockquote>
        “Talk is cheap. Open the code :)”
    </blockquote>

    @forelse($articles   as  $article)
        <article>
            <div class="meta">
                <p class="date">
                    {{ date('l \t\h\e jS Y'  ,   strtotime($article->created_at)) }}
                </p>

                <h1><a href="{{ route('articles.show',   ['id'   =>  $article->id]) }}">{{ $article->title }}</a></h1>

                <p>
                    @if(strlen($article->description)   >   50)
                        {!! $text   =    substr($article->description,  0,  50)!!}
                    @else
                        {!! $text   =   $article->description !!}
                    @endif
                    {{ $text }}
                </p>



                <p><a href="{{ route('articles.show',   ['id'   =>  $article->id]) }}" class="button">Read more</a></p>
            </div>
        </article>
        @empty
        <article>
            <div class="meta">
                <p class="date">
                    {{ date('Y  m   d') }}
                </p>

                <h1><a href="#">Opps!</a></h1>

                <p>It looks like your database is poor! Make sure you have some <a href="http://localhost/phpmyadmin">articles</a> to read</p>
                <p>Then make sure you run: php artisan db:seed --class=CategoriesSeed && php artisan db:seed --class=ArticlesSeeder respectively </p>


            </div>
        </article>

    @endforelse

    <section class="pagination">
        @if(count($articles)    >   1)
            {{ $articles->links() }}
        @endif
    </section>

@stop