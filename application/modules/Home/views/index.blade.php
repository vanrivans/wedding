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
				
				<div>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div><br>
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

	<section class="content" id="sec-content">
		@include('Home.views.partial_detail.content')
	</section>

	<section class="remaining" id="sec-remaining">
		@include('Home.views.partial_detail.remaining')
	</section>

	<section class="event" id="sec-event">
		@include('Home.views.partial_detail.event')
	</section>

	<section class="absent">
		@include('Home.views.partial_detail.absent')
	</section>

	<section class="galleries" id="sec-galleries">
		@include('Home.views.partial_detail.galleries')
	</section>

	<section class="health_protocol">
		<div class="col-12" style="border: 2px solid var(--clr-secondary)">
			@include('Home.views.partial_detail.health_protocol')
		</div>
	</section>

	<section class="wishes" id="sec-wishes">
		@include('Home.views.partial_detail.wishes')
	</section>

	<section class="footer">
		<div class="row">
			<div class="col">
				<div class="footer__text">
					Terima kasih atas doa restunya
				</div>
				<div class="footer__name">
					
					<div class="row footer__border" style="margin:7.5% 0">
						<div class="col-6 col-br-l">
							<img src="{{ base_url('assets/templates/br-top-l.png') }}" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="{{ base_url('assets/templates/br-top-r.png') }}" style="width:100%;height:100%">
						</div>
					</div>
					<span>{{ $brideName1 }} & {{ $brideName2 }}</span>
					<div class="row footer__border m-0">
						<div class="col-6 col-br-l">
							<img src="{{ base_url('assets/templates/br-bot-l.png') }}" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="{{ base_url('assets/templates/br-bot-r.png') }}" style="width:100%;height:100%">
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

@endsection


