@extends('layouts.app')

@section('content')



<div class="col-md-8 col-md-offset-2">
    {{ Form::open(array('route' => 'section.update', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('name', 'Name:') }}
        {{Form::text('name',$section->name, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
    <div class="form-group">
    
        {{Form::label('description', 'Description:') }}
        {{Form::text('description', $section->description, array('class' => 'form-control'))}}
    </div>
        
        <br>
        
        {{ Form::submit('Update Section', array('onClick' => 'return validate();', 'class' => 'btn btn-success btn-lg'))}}

        <input type="hidden" value="{{ $section->id }}" name="id">
    
    
    {{ Form::close() }}
</div>

	<script type="text/javascript" src="{{ URL::asset('js/validation/menuSections.js') }}"></script>
@endsection