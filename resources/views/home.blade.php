@extends('layouts.myapp')

@section('content')

	@include('home.nav')
	@include('home.about')
	@include('home.quote')

	@if($showSection->show_featured)
		@include('home.featured')
	@endif
	@include('home.menu')
	<!-- @include('home.events') -->

	@if($showSection->show_reservation)
		@include('home.reserve')
	@endif

	@if($showSection->show_reservation)
		@include('home.modal')
	@endif
	
	@include('home.footer')

@endsection