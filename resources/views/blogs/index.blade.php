@extends('layouts/app')

@section('content')
    @foreach($blogs as $blog)

        <div class="blog-post">
            <h2 class="blog-post-title"><a href="{{ url('/blogs', $blog->id) }}">{{ $blog->title }}</a></h2>
            <p class="blog-post-meta">{{ $blog->published_at_formated }} by <a href="#">{{ $blog->user->name }}</a></p>

            <p>{{ $blog->body }}</p>
        </div>

    @endforeach
    
    {{ $blogs->appends(Request::except('page'))->links() }}
    {{-- $blogs->total() --}}
@stop