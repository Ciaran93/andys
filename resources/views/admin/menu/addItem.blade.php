
    
    
    {{ Form::open(array('route' => 'items.add', 'class' => 'form')) }}
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

                @foreach($sections as $section)
                    <option value="{{ $section->id }}">{{ $section->name }}</option>    
                @endforeach

        </select>

        <input type="checkbox" name="featured" value="featured">Featured Item</input>
        <input type="checkbox" name="gf" value="gf">GF</input>
        <input type="checkbox" name="veg" value="veg">Veg</input>

        <br>
        
        {{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}
