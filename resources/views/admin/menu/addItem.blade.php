
    
    
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

        {{ Form::submit('Add Item', array('class' => 'btn btn-success btn-lg'))}}
    
    
    {{ Form::close() }}
