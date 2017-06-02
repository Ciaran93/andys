@extends('layouts.app')

@section('content')

<div class="col-md-12">
<h1>Update Foods Information</h1>

    <h2>Current About</h2>
    @foreach($foods as $food)

    <h2>{{ $food->name}}</h2>
    <p>{{ $food->description }}</p>

    @endforeach



    {{ Form::open(array('route' => 'about.update', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('content', 'Content:') }}
        {{Form::textarea('content',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
    <div class="form-group">
        {{Form::label('image', 'Image link:') }}
        {{Form::text('imageurl',null, array('class' => 'form-control'))}}
    </div>
        {{ Form::submit('Update about', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}

</div>
    


@endsection