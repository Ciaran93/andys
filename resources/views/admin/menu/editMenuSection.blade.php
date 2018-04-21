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

<div class="col-md-8 col-md-offset-2">

<h3>Menu Categories</h3>
<table class="table table-striped">
<thead>
    <tr>
        <th>Name</th>
    </tr>
</thead>
<tbody>

@foreach($categories as $category)
        @if($category->menu_section_id == $section->id)
            <tr>
                <td>{{ $category->name }} </td>
                <td><a href="/admin/menu/section/{{$section->id}}/categories/delete/{{$category->id}}" class="button" onclick="">DELETE</a></td>
            </tr>
        @endif
    @endforeach
</tbody>
</table>

</div>

<div class="col-md-8 col-md-offset-2">
    <button class="btn btn-success btn-lg" href="admin/menu/sections/categories/{{$section->id}}"><a href="/admin/menu/sections/categories/{{$section->id}}">Add Menu Categories</a> </button>
</div>


	<script type="text/javascript" src="{{ URL::asset('js/validation/menuSections.js') }}"></script>
@endsection