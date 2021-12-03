{{-- Get layout --}}
@extends('Layouts.layout')

{{-- Define header --}}
@section('header')
	
	<section class="header" id="sec-header">

	</section>

	<section class="header_prolog" id="sec-header-prolog">
		@include('Home.views.partial_detail.header-prolog')
	</section>

@endsection

{{-- Define main --}}
@section('main')
	
	<section class="recipient" id="sec-recipient">
		@include('Home.views.partial_detail.recipient')
	</section>

	<section class="content">
		@include('Home.views.partial_detail.content')
	</section>

	<section class="remaining" id="sec-remaining">
		@include('Home.views.partial_detail.remaining')
	</section>

	<section class="event">
		@include('Home.views.partial_detail.event')
	</section>

@endsection

{{-- Define script --}}
@section('script')

@endsection
