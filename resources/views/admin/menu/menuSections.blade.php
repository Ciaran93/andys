@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Menu Sections</h2>
            <h3>Edit and add menu sections.</h3>

            <button type="button" class="btn btn-primary" onClick="$('#add_menu_section').toggle();">Add Section</button>

    
            {{ Form::open(array('route' => 'sections.add', 'class' => 'form', 'id' => 'add_menu_section', 'style'=>'display:none')) }}
            
            <h4>Add new Menu Section</h4>
            
            <div class="form-group">
                {{Form::label('name', 'Name:') }}
                {{Form::text('name',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
            
                {{Form::label('description', 'Description:') }}
                {{Form::text('description', null, array('class' => 'form-control'))}}
            </div>
                
                {{ Form::submit('Add Section', array('onClick' => 'return validate();', 'class' => 'btn btn-success btn-lg'))}}

    {{ Form::close() }}

    <!-- DISPLAY MENU SECTIONS -->

    <hr>

    <h4>Current Menu Sections</h4>
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>EDIT</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        @isset($sections)
            @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->name }} </td>
                    <td>{{ $section->description }}</td>
                    <td><a href="/admin/menu/section/edit/{{$section->id}}" class="button">Edit</a></td>
                    <td><a href="/admin/menu/section/delete/{{$section->id}}" class="button" onclick="return confirmDelete();">DELETE</a></td>
                </tr>
            @endforeach
        @endisset
    </tbody>
    </table>
    
	<script type="text/javascript" src="{{ URL::asset('js/validation/menuSections.js') }}"></script>

@endsection