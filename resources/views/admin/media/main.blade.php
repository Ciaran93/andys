@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1>Media</h1>


        <h2>Upload files: </h2>
        <p>Upload an image here</p>
            {{ Form::open(array('route' => 'upload', 'class' => 'form', 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                {{Form::label('imageName', 'Image Name:') }}
                {{Form::text('imageName',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{Form::label('image', 'Image link:') }}
                {{Form::file('imageurl',null, array('class' => 'form-control'))}}
            </div>
                {{ Form::submit('Upload', array('class' => 'btn btn-success btn-lg'))}}
            
            {{ csrf_field() }}
            {{ Form::close() }}

            <div class="col-md-2">
                @foreach ($files as $file)
                    <img class="img-responsive" src="/storage/{{$file}}" alt="">
                @endforeach

            </div>
    </div>
</div>
@endsection