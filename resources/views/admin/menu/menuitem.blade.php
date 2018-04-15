@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Menu</h1>
            <h3>Edit and add menu items here.</h3>

            <button type="button" class="btn btn-primary" onClick="$('#add_menu_item').toggle();">Add Section</button>

    {{ Form::open(array('route' => 'items.add', 'class' => 'form', 'id' => 'add_menu_item', 'style' => 'display:none')) }}
    
    <h4>Add new Menu Item</h4>
    
    <div class="form-group">
        {{Form::label('name', 'Name:') }}
        {{Form::text('name',null, array('autofocus'=>'autofocus', 'class' => 'form-control'))}}
    </div>
    <div class="form-group">
    
        {{Form::label('description', 'Description:') }}
        {{Form::text('description', null, array('class' => 'form-control'))}}
    </div>
        
    <div class="form-group">        
        {{Form::label('price', 'Price:') }}
        {{Form::text('price', null, array('class' => 'form-control'))}}
    </div>

        <select class="form-control m-bot15" name="section_id" id="section_id">
            <option value="0">Select Section</option>    
                @if($sections != null)
                    @foreach($sections as $section)
                        <option value="{{ $section->id }}">{{ $section->name }}</option>    
                    @endforeach
                @endif
        </select>
        
        <div class="checkbox">
            <label><input type="checkbox" name="featured" value="featured">Featured Item</label>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="veg" value="veg">Veg</label>
        </div>

        <div class="checkbox">
            <label><input type="checkbox" name="gf" value="gf">Gluten Free</label>
        </div>

        
        {{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}


            <h4>Current Menu</h4>
            @isset($sections)
            
                @foreach ($sections as $section)

                <h2>{{ $section->name }}</h2>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Featured</th>
                        <th>GF</th>
                        <th>VEG</th>
                        <th>EDIT</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                <tbody>
                @isset($items)
                    @foreach ($items as $item)
                        @if($item->section_id === $section->id)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }} </td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->featured }}</td>
                                <td>{{ $item->gf }}</td>
                                <td>{{ $item->veg }}</td>
                                <td><a href="/admin/editItem/{{$item->id}}" class="button">Edit</a></td>
                                <td><a href="/admin/delete/{{$item->id}}" class="button" onclick="comfirmDelete();">DELETE</a></td>
                            </tr>
                        @endif
                    @endforeach
            @endisset
                </tbody>
                </table>

                @endforeach
        @endisset

                <script>
                public function comfirmDelete(){
                    if (confirm("Click OK to continue?")){
                        $('form#delete').submit();
                    }
                }

                });
                </script>



            </div>
        </div>
    </div>
</div>
@endsection
