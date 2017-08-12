<?php use Carbon\Carbon;?>

@extends('layouts.home')

@section('content')
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
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
    <div class="my-container">
        @if(Auth::user())
            <div class="comment-box">
            <blockquote>
                "Thoughts have energy.  Make sure your thoughts are positive & powerful"
            </blockquote>
            <div class="row">

                <div class="col-md-12">
                    <div class="widget-area no-padding blank">
                        <div class="status-upload">
                            <form>
                                {{ csrf_field() }}
                                <textarea placeholder="What are your thoughts on that?" name="comment"  id="comment-text"></textarea>

                                <button type="submit" class="btn btn-success green comment-submit" onclick="return false;"><i class="fa fa-share"></i> Comment</button>
                            </form>
                        </div><!-- Status Upload  -->
                    </div><!-- Widget Area -->
                </div>


            </div>
        </div>
        @endif
        <div class="row" style="margin-top: 20px;">
            @forelse($comments  as  $comment)
                <div class="col-sm-12">
                    <div class="panel panel-white post panel-shadow">
                        <div class="post-heading">
                            <div class="pull-left image">
                                <img src="http://bootdey.com/img/Content/user_1.jpg" class="img-circle avatar" alt="user profile image">
                            </div>
                            <div class="pull-left meta">
                                <div class="title h5">
                                    <a href="#"><b>{{ $comment->user()->first()->name }}</b></a>
                                    made a thought.
                                </div>
                                @php
                                    $currentTime = \Carbon\Carbon::now();
                                @endphp
                                <h6 class="text-muted time">{{ $currentTime->diffInDays($comment->created_at) }} days before</h6>
                            </div>
                        </div>
                        <div class="post-description">
                            <p>{{ $comment->description }}</p>
                        </div>
                    </div>
                </div>
            @empty
                @if(Auth::guest())
                    <p>This article has no comments. <a href="{{ route('login') }}">Sign in</a> and be the first one who share his thoughts here.</p>
                @else
                    <p>This article has no comments. It would be great if you were the first one who make leaves his thought on here!</p>
                @endif
                    @endforelse
    </div>
    <div class="pagination">
        <a href="{{ route('articles.show',  ['id'   =>  $article->id    -   1]) }}" class="button button-previous">Older</a>
        <a href="{{ route('articles.show',  ['id'   =>  $article->id    +   1]) }}" class="button button-next">Next</a>
    </div>

    <script>
        var _commentRoute    =   '{{ route('articles.comment',  ['article'  =>  $article->id]) }}';

    </script>
@stop