
@extends('layouts.app')

@section('content')

    {{ Form::open(array('route' => 'showSections.update', 'class' => 'form')) }}
        <div class="col-md-8 col-md-offset-2">

            <div class="form-group">
                <label for="show_menu">Show Featured </label>
                <input type="checkbox" name="show_featured" @if($section->show_featured) checked @endif></input>
            </div>
            
            <div class="form-group">
                <label for="show_menu">Show Reservation</label>
                <input type="checkbox" name="show_reservation" @if($section->show_reservation) checked @endif></input>
            </div>
            
            <div class="form-group">
                <label for="show_menu">Show Gift</label>
                <input type="checkbox" name="show_gift" @if($section->show_gift) checked @endif></input>
            </div>


            {{ Form::submit('Update', array('class' => 'btn btn-success btn-lg'))}}
            
        </div>

    
    
    {{ Form::close() }}
    
 @endsection