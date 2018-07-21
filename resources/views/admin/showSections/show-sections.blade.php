
@extends('layouts.app')

@section('content')

    {{ Form::open(array('route' => 'showSections.update', 'class' => 'form')) }}
        <div class="col-md-3 col-md-offset-3">

            <div class="form-group">
                <label for="show_menu">Show Menu </label>
                <input type="checkbox" name="show_menu" @if($section->show_menu) checked @endif></input>
            </div>

            <div class="form-group">
                <label for="show_menu">Show About </label>
                <input type="checkbox" name="show_about" @if($section->show_about) checked @endif></input>
            </div>

            <div class="form-group">
                <label for="show_menu">Show Featured </label>
                <input type="checkbox" name="show_featured" @if($section->show_featured) checked @endif></input>
            </div>
            {{ Form::submit('Update', array('class' => 'btn btn-success btn-lg'))}}

        </div>

        <div class="col-md-3">

            <div class="form-group">
                <label for="show_menu">Show Tripadvisor </label>
                <input type="checkbox" name="show_featured" @if($section->show_tripadvisor) checked @endif></input>
            </div>
            
            <div class="form-group">
                <label for="show_menu">Show Reservation</label>
                <input type="checkbox" name="show_reservation" @if($section->show_reservation) checked @endif></input>
            </div>
            
            <div class="form-group">
                <label for="show_menu">Show Gift</label>
                <input type="checkbox" name="show_gift" @if($section->show_gift) checked @endif></input>
            </div>


            
        </div>

    
    
    {{ Form::close() }}
    
 @endsection