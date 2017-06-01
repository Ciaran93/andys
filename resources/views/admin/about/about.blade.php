@extends('layouts.app')

@section('content')

<div class="col-md-12">
<h1>Update About</h1>

    <h2>Current About</h2>
    <p>{{ $about->content }}</p>
    <br>
    <hr>

    {{ Form::open(array('route' => 'about.update', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('content', 'Content:') }}
        {{Form::textarea('content',$about->content, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>

        {{ Form::submit('Update about', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}

</div>
    


@endsection