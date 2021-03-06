@extends('layouts.myapp')

@section('content')

	@include('home.nav')
	@if($showSection->show_about)
		@include('home.about')
	@endif

	@if($showSection->show_tripadvisor)
		@include('home.quote')
	@endif

	@if($showSection->show_featured)
		@include('home.featured')
	@endif

	@if($showSection->show_menu)
		@include('home.menu')
	@endif

	@if($showSection->show_gift)
		@include('gift.giftsection')
	@endif

	@include('home.reserve')

	@if($showSection->show_reservation)
		@include('home.modal')
	@endif
	
	@include('home.footer')

@endsection