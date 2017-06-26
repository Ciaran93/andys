@extends('layouts.myapp')

@section('content')
@include('home.navSingle')

<div class="col-md-10 col-md-offset-1">
<br>
    <div class="col-md-10">
        <h1>{{ $blogPost->title }}</h1>
    <hr>
        <p>{{ $blogPost->body }}</p>
        <p>{{ $blogPost->created_at }}</p>
        <hr>
    </div>

    <div class="col-md-5">
            <img src="{{ asset('images/bramble.jpg') }}" class="img-responsive" alt="">
    </div>    

    <div class="col-md-3" style="">
        <iframe style="padding:20px" width="560" height="315" src="https://www.youtube.com/embed/082uiyZF0eg" frameborder="0" allowfullscreen></iframe>
    </div>

</div>
@endsection