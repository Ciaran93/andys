@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    {{ Form::open(array('route' => 'category.add', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('name', 'Name:') }}
        {{Form::text('name',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
        <br>
        
        <input type="hidden" value="{{$menu_section_id}}" name="menu_section_id">
        {{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
    
    {{ Form::close() }}
    </div>   
    
    
@endsection