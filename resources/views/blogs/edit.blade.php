@extends('layouts/app')

@section('content')
    <div class="blog-post">
        <h1>Edit: {!! $blog->title !!}</h1>

        <hr/>

        {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['BlogsController@update', $blog->id]]) !!}
            @include('blogs/form', ['submitButtonText' => 'Update Blog'])
        {!! Form::close() !!}

        @include('errors/list')
    </div>
@stop