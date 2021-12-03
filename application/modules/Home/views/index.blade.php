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

	<section class="content">
		@include('Home.views.partial_detail.content')
	</section>

	<section class="remaining" id="sec-remaining">
		@include('Home.views.partial_detail.remaining')
	</section>

	<section class="event">
		@include('Home.views.partial_detail.event')
	</section>

	<section class="absent">

		<div class="row absent__row">
			<div class="col">
				<img src="{{ base_url('assets/template/mark-l.png') }}" class="absent__mark mark-l">
				<div class="absent__title">
					Konfirmasi Kehadiran
				</div>
				<img src="{{ base_url('assets/template/mark-r.png') }}" class="absent__mark mark-r">
			</div>
		</div>

		<div class="row">
			<div class="col">
				<form id="form-absent">
					<input type="hidden" name="input_absent" id="input_absent" value="0">
					<div class="d-grid gap-2">
						<button type="button" class="btn btn-absent btn-absent-y" data-id="y" id="btn-absent-y">
							<span class="btn__inner">Saya akan hadir</span>
						</button>
						<button type="button" class="btn btn-absent btn-absent-n" data-id="n" id="btn-absent-n">
							<span class="btn__inner">Saya tidak dapat hadir</span>
						</button>
						<button type="submit" class="btn" id="btn-absent-submit">
							<span class="btn__inner">Konfirmasi</span>
						</button>
					</div>
				</form>
			</div>
		</div>

	</section>

@endsection

{{-- Define script --}}
@section('script')

<script type="text/javascript">

	$(".btn-absent").click( function () {

		var param = $(this).data('id');

		$(".btn-absent").removeClass('active');
		$("#btn-absent-" + param).addClass('active');

		if (param == 'y') {
			$("#input_absent").val(1);
		} else {
			$("#input_absent").val(0);
		}
	});

	$("#form-absent").submit( function () {

		if (! $(".btn-absent").hasClass('active')) {
			return false;
		}

		console.log(true);
	});

</script>

@endsection
