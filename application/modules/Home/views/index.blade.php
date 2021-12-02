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
	
	@include('Home.views.partial_detail.recipient')

	<section class="content">
		@include('Home.views.partial_detail.content')
	</section>

	<section class="remaining" id="sec-remaining">
		{{-- <div class="row">
			<div class="col-xs-12">
				<a href="http://www.google.com/calendar/render?action=TEMPLATE&amp;text=Hendrasta+%26+Kharida+Wedding&amp;dates=20211120T070000/20211120T080000&amp;details=Kehadiran+You%27re+Invited+to+our+wedding+ceremony+%7C+Hendrasta+%26+Kharida+Wedding+%7C+Saturday%2C+20+November+2021" target="_blank" rel="nofollow">Add to Calendar</a>
			</div>
		</div> --}}
	</section>

	<section class="event">
		@include('Home.views.partial_detail.event')
	</section>

@endsection

{{-- Define script --}}
@section('script')

@endsection
