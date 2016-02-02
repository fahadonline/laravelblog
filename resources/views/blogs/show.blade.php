@extends('layouts/app')

@section('content')
    <div class="blog-post">
        @can('update-post', $blog)
            <h2 class="blog-post-title">{!! link_to_action('BlogsController@edit', $blog->title, [$blog->id]) !!}</h2>
        @else
            <h2 class="blog-post-title">{!! link_to_action('BlogsController@show', $blog->title, [$blog->id]) !!}</h2>
        @endcan        
        <p class="blog-post-meta">{{ $blog->published_at_formated }} by <a href="#">{{ $blog->user->name }}</a></p>

        <p>{{ $blog->body }}</p>
        
        @unless($blog->tags->isEmpty())
            <h5>Tags:</h5>
            <ul>
                @foreach($blog->tags as $tag)
                <li>{{ $tag->name }}</li>
                @endforeach
            </ul>
        @endunless
    </div>
@stop