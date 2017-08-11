@extends('layouts.home')

@section('content')


    <article>
        <h1>{{ $article->title }}</h1>

        <!--more-->

        <p>
            {{ strip_tags($article->description) }}
        </p>

        <p class="date">
            {{ date('l \t\h\e jS'  ,   strtotime($article->created_at)) }}
        </p>
    </article>

    <div class="pagination">
        <a href="{{ route('articles.show',  ['id'   =>  $article->id    -   1]) }}" class="button button-previous">Older</a>
        <a href="{{ route('articles.show',  ['id'   =>  $article->id    +   1]) }}" class="button button-next">Next</a>
    </div>

@stop