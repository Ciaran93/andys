@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
<h1>Blog</h1>

    <h2>Current Blog Posts</h2>
    @foreach($blogPosts as $post)
    <h3>{{ $post->title}}</h3>
    <p>{{ $post->body }}</p>
    <p><span>Posted at: {{ $post->created_at}}</span></p>
    <br>

    @endforeach

    {{ Form::open(array('route' => 'blog.update', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('title', 'Title:') }}
        {{Form::text('title',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Content:') }}
        {{Form::textarea('body',null, array('class' => 'form-control'))}}
    </div>
        {{ Form::submit('Add Blog Post', array('class' => 'btn btn-success btn-lg'))}}
    
    {{ Form::close() }}

</div>
    


@endsection