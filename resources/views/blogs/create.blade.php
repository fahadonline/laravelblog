@extends('layouts/app')

@section('content')
    <div class="blog-post">
        <h1>Write a New Blog</h1>

        <hr/>

        {!! Form::model($blog = new \App\Blog, ['url' => 'blogs']) !!}
            @include('blogs/form', ['submitButtonText' => 'Add Blog'])
        {!! Form::close() !!}

        @include('errors/list')
    </div>
@stop