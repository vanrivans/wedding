{{-- Get layout --}}
@extends('Layouts.layout')

{{-- Define header --}}
@section('header')
	
	<section class="header" id="sec-header">

		<div class="row header__row"></div>
		
		<div class="header__box">
			<div class="header__name">{{ $brideName1 }} & {{ $brideName2 }}</div>
			<div class="header__date">{{ $resepsiDay }}<br>{{ $resepsiDate }}</div>
		</div>

	</section>

	<section class="header_prolog" id="sec-header-prolog">
		
		<div class="row">
			<div class="col-xs-12">
				
				<div> وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُمْ مِنْ أَنْفُسِكُمْ أَزْوَاجًا لِتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ لِقَوْمٍ يَتَفَكَّرُونَ </div>
				<br>
				<p class="header_prolog__content">"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untumu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya. dan Dia menjadikan di antaramu rasa kasih dan sayang.<br>(Ar-rum: 21)"</p>
			</div>
		</div>

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
