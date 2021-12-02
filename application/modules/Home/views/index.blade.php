{{-- Get layout --}}
@extends('Layouts.layout')

{{-- Define header --}}
@section('header')
	
	<section class="header" id="sec-header">

	</section>

	<section class="header_prolog" id="sec-header-prolog">

		<div class="row">
			<div class="col-xs-12">
				
				<div> وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُمْ مِنْ أَنْفُسِكُمْ أَزْوَاجًا لِتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ لِقَوْمٍ يَتَفَكَّرُونَ </div>
				<br>
				<p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untumu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya. dan Dia menjadikan di antaramu rasa kasih dan sayang. (Ar-rum: 21)"</p>
			</div>
		</div>
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
		
		<div class="row">

			<div class="col-xs-12">
				
				<div class="event__prolog" id="sec-event-prolog">
					
					<div class="event__prolog__title title_style">
						<span>Acara Pernikahan</span>
					</div>
					<p class="event__prolog__content">
						Untuk melaksanakan syariat agama-Mu, mengikuti sunnah rasul-Mu dalam membentuk keluarga yang Sakinah, Mawaddah, Warahmah yang Insya Allah akan diselenggarakan pada hari:
					</p>
				</div>
			</div>

			<div class="col-xs-12">
				<div class="event__date title_style" id="sec-event-date">
					<span>{{ $resepsiDay }}</span><br>
					<span>{{ $resepsiDate }}</span>
				</div>
			</div>

			<div class="col-xs-12">

				<div class="event__akad" id="sec-event-akad">

					<div class="event__akad__title title_style">
						Akad Keluarga
					</div>
					<div class="event__akad__time">
						{{ $akadTime }}
					</div>
					<div class="event__akad__place mb-2">
						{{ $akadPlace }}
					</div>
					<p class="event__akad__address">
						{{ $akadAddress }}
					</p>
					<a href="{{ $akadLoc }}" target="_blank">
						<button class="btn"><span class="btn__inner btn_maps">Lihat Maps</span>
						</button>
					</a>

				</div>

			</div>

			<div class="col-xs-12">

				<div class="event__resepsi" id="sec-event-resepsi">

					<div class="event__resepsi__title title_style">
						Resepsi
					</div>
					<div class="event__resepsi__time">
						{{ $resepsiTime }}
					</div>
					<div class="event__resepsi__place mb-2">
						{{ $resepsiPlace }}
					</div>
					<p class="event__resepsi__address">
						{{ $resepsiAddress }}
					</p>
					<a href="{{ $resepsiLoc }}" target="_blank">
						<button class="btn">
							<span class="btn__inner btn_maps">Lihat Maps</span>
						</button>
					</a>

				</div>

			</div>

		</div>
	</section>

@endsection

{{-- Define script --}}
@section('script')

@endsection
