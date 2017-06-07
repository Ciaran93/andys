@extends('layouts.app')

@section('content')
    {{ Form::open(array('route' => 'items.update', 'class' => 'form')) }}
    <div class="form-group">
        {{Form::label('name', 'Name:') }}
        {{Form::text('name',$item->name, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
    <div class="form-group">
    
        {{Form::label('description', 'Description:') }}
        {{Form::text('description', $item->description, array('class' => 'form-control'))}}
    </div>
        
    <div class="form-group">        
        {{Form::label('price', 'Price:') }}
        {{Form::text('price', $item->price, array('class' => 'form-control'))}}
    </div>

        <select class="form-control m-bot15" name="section_id" id="section_id">
            <option value="">Select Section</option>    

                @foreach($sections as $section)
                    <option @if ($section->id === $item->section_id) selected @endif value="{{ $section->id }}">{{ $section->name }}</option>    
                @endforeach

        </select>

        <input type="checkbox" name="featured" @if ($item->featured) checked @endif value="featured">Featured Item</input>
        <input type="checkbox" name="gf" value="gf" @if ($item->gf) checked @endif>GF</input>
        <input type="checkbox" name="veg" value="veg" @if ($item->veg) checked @endif>Veg</input>
        <input type="hidden" name="id" value="{{$item->id}}"></input>

        <br>
        
        {{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}

@endsection