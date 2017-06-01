@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Menu</h1>
            <h3>Edit and add menu items here.</h3>

            <h4>Current Menu</h4>
            @include('admin.menu.allItems')

            <h4>Add new Menu Item</h4>

            @include('admin.menu.addItem')
            </div>
        </div>
    </div>
</div>
@endsection
