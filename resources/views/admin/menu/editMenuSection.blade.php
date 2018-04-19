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

    @foreach( $sectionTypesSelected as $type)
        <option value="{{ $type->id }}" > {{ $type->name }}</option>
    @endforeach
        
        <br>
       
    <select class="mdb-select colorful-select dropdown-primary" multiple searchable="Search here.." name="section_types" id="section_types">
        <option value="" >Choose section types to add</option>
            @foreach( $sectionTypes as $type)
                <option value="{{ $type->id }}" @if(in_array($type->id, $selectedIds)) selected @endif > {{ $type->name }}</option>
            @endforeach
    </select>
<br>
<br>
 {{ Form::submit('Update Section', array('onClick' => 'setMenuSectionTypesSelected(); return validate();', 'class' => 'btn btn-success btn-lg'))}}

<input type="hidden" value="{{ $section->id }}" name="id">
<input type="hidden" value="" name="menu_section_types_arr" id="menu_section_types_arr">


{{ Form::close() }}
</div>
	<script type="text/javascript" src="{{ URL::asset('js/validation/menuSections.js') }}"></script>

@endsection