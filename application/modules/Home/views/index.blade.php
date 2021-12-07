{{-- Get layout --}}
@extends('Layouts.layout')

{{--  Define navbar --}}
@section('navbar')

	<nav class="navbar fixed-bottom">
		<ul class="container-fluid m-0">
			<li class="">
				<a class="" aria-current="page" href="#">
					<i class="bi bi-house-fill d-block"></i>
					Home
				</a>
			</li>
			<li class="">
				<a class="" aria-current="page" href="#sec-content">
					<i class="bi bi-heart-fill d-block"></i>
					Couple
				</a>
			</li>
			<li class="">
				<a class="" aria-current="page" href="#sec-event">
					<i class="bi bi-calendar-event-fill d-block"></i>
					Event
				</a>
			</li>
			<li class="">
				<a class="" aria-current="page" href="#sec-galleries">
					<i class="bi bi-camera-fill d-block"></i>
					Galleries
				</a>
			</li>
			<li class="">
				<a class="" aria-current="page" href="#sec-wishes">
					<i class="bi bi-chat-text d-block"></i>
					Wishes
				</a>
			</li>
		</ul>
	</nav>

@endsection

{{--  Define cober --}}
@section('cover')

	{{-- Cover --}}
	<section class="cover">
		@include('Layouts.config._cover')
	</section>

@endsection

{{-- Define header --}}
@section('header')
	
	<section class="header" id="sec-header">

		<div class="row header__row"></div>
		
		<div class="header__box">
			<div class="header__name">{{ $brideName1 }} & {{ $brideName2 }}</div>
			<div class="header__date">{{ $resepsiDay }}<br>{{ $resepsiDate }}</div>
		</div>

	</section>

	<center>
	<section class="header_prolog" id="sec-header-prolog">
		
		<div class="row">
			<div class="col-xs-12">
				
				<div class="arabic">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</div><br>
				<div class="arabic"> وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُمْ مِنْ أَنْفُسِكُمْ أَزْوَاجًا لِتَسْكُنُوا إِلَيْهَا وَجَعَلَ بَيْنَكُمْ مَوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ لِقَوْمٍ يَتَفَكَّرُونَ </div>
				<br>
				<p class="header_prolog__content">"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untumu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya. dan Dia menjadikan di antaramu rasa kasih dan sayang.<br>(Ar-rum: 21)"</p>
			</div>
		</div>

	</section>
	</center>

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

	<center>
	<section class="event" id="sec-event">
		@include('Home.views.partial_detail.event')
	</section>
	</center>

	<center>
	<section class="absent">
		@include('Home.views.partial_detail.absent')
	</section>
	</center>

	<section class="galleries" id="sec-galleries">
		@include('Home.views.partial_detail.galleries')
	</section>

	<center>
	<section class="health_protocol">
		<div class="col-12" style="border: 2px solid var(--clr-secondary)">
			@include('Home.views.partial_detail.health_protocol')
		</div>
	</section>
	</center>

	<center>
	<section class="wishes" id="sec-wishes">
		@include('Home.views.partial_detail.wishes')
	</section>
	</center>

	<center>
	<section class="footer">
		<div class="row">
			<div class="col">
				<div class="footer__text">
					Terima kasih atas doa restunya
				</div>
				<div class="footer__name">
					
					<div class="row footer__border" style="margin:7.5% 0">
						<div class="col-6 col-br-l">
							<img src="{{ $templatePath . 'br-top-l.png' }}" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="{{ $templatePath . 'br-top-r.png' }}" style="width:100%;height:100%">
						</div>
					</div>
					<span>{{ $brideName1 }} & {{ $brideName2 }}</span>
					<div class="row footer__border m-0">
						<div class="col-6 col-br-l">
							<img src="{{ $templatePath . 'br-bot-l.png' }}" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="{{ $templatePath . 'br-bot-r.png' }}" style="width:100%;height:100%">
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	</center>

	<audio id="song" preload="auto">
		<source src="{{ $Song }}" type="audio/mp3">
	</audio>
	<div class="pause-song">
		<i class="bi bi-pause-circle icons-song"></i>
	</div>

@endsection


{{-- Define script --}}
@section('script')

	<script type="text/javascript">

		$(document).ready( function () {
			get_comment();
		});

		$(".btn-absent").click( function () {

			var param = $(this).data('id');

			$(".btn-absent").removeClass('active');
			$("#btn-absent-" + param).addClass('active');

			if (param == 'y') {
				$("#input_absent").val(1);

				showAbsentVal();
			} else {
				$("#input_absent").val(0);

				hideAbsentVal();
			}
		});

		$("#form-absent").submit( function (e) {
			e.preventDefault();

			if (! $(".btn-absent").hasClass('active')) {
				return false;
			}

			var apiAddress 		= "<?= $apiAddress; ?>";
			var rID				= "<?= $r_id; ?>";
			var absent 			= $("#input_absent").val();
			var total_person 	= $("#input_absent_val").val();

			$.ajax({
				url: apiAddress + 'submit_absent',
				type: 'post',
				data: {
					r_id: rID,
					absent: absent,
					total_person: total_person
				},
				dataType: 'json',
				success: function (response) {

					if (response.Status == 200) {
						alert(response.Message);
						// $('#form-absent').reset();
					}
				}
			})
		});

		function showAbsentVal() {

			$(".absent__val__row").removeClass("d-none").addClass("d-flex");
			resetAbsentVal();
		}

		function hideAbsentVal() {

			$(".absent__val__row").removeClass("d-flex").addClass("d-none");
			resetAbsentVal();
		}

		function resetAbsentVal() {
			$("#btn-absent-minus").addClass("disabled");

			$("#absent__text").html(1);
			$("#input_absent_val").val(1);
		}

		function calcAbsentVal(param) {

			var value = $("#input_absent_val").val();

			if (param == '+') {
				value = +value + 1;
			} else {
				value = +value - 1;
			}

			if (value > 1) {
				$("#btn-absent-minus").removeClass('disabled');
			} else {
				$("#btn-absent-minus").addClass('disabled');
			}

			$("#absent__text").html(value);
			$("#input_absent_val").val(value);
		}

		
		function get_comment(page = 1) {

			var apiAddress = "<?= $apiAddress; ?>";
			var c_id = "<?= $c_id; ?>";

			$.ajax({
				url: apiAddress + 'comment/' + c_id + '/' + page,
				dataType: 'json',
				success: function (response) {

					if (response.Status == 200) {
						
						if (response.data.data.length > 0) {

							var html = '';

							for (i = 0; i < response.data.data.length; i++) {

								html += append_comment(response.data.data[i]['name'], response.data.data[i]['comment'], i);
							}

							var load_all = '<div class="row"><div class="col text-center"><span id="load-all">Load All</span></div></div>';

							$('#comment-list').prepend(html);
							$('#comment-list').append(load_all);
							

							$('#load-all').click( function () {
								$('.wishes__row__comment').removeClass('d-none');
								$(this).addClass('d-none');
							});
						}
					}
				}
			});
		}

		function append_comment(name, comment, i) {

			var html = '';
			var d_none = '';

			if (i >= 10) {
				d_none = 'd-none';
			}

			html += '<div class="row wishes__row__comment ' + d_none + '">';
				html += '<div class="col-2 pr-0 text-center">';
					html += '<i class="bi bi-person-circle wishes__icon"></i>';
				html += '</div>';
				html += '<div class="col-10">';
					html += '<div class="wishes__person">' + name + '</div>';
					html += '<p class="wishes__comment">' + comment + '</p>';
				html += '</div>';
			html += '</div>';

			return html;
		}

		$('#form-wishes').submit( function (e) {
			e.preventDefault();

			var wishes_text = $('#wishes-text').val();

			if (wishes_text == '' || wishes_text == null) {
				return false;
			}

			var apiAddress 	= "<?= $apiAddress; ?>";
			var r_name 		= "<?= $recipient; ?>";
			var r_id 		= "<?= $r_id; ?>";
			var c_id 		= "<?= $c_id; ?>";

			$.ajax({
				url: apiAddress + 'submit_comment',
				type: 'post',
				data: {
					r_id: r_id,
					c_id: c_id,
					comment: wishes_text
				},
				dataType: 'json',
				success: function (response) {

					if (response.Status == 200) {

						$('#wishes-text').val('');

						html = append_comment(r_name, wishes_text);

						$('#comment-list').prepend(html);
					}
				}
			});
		});

		var e_date = "<?= $eventDate; ?>";

		// Set the date we're counting down to
		var countDownDate = new Date(e_date).getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

			// Get today's date and time
			var now = new Date().getTime();

			// Find the distance between now and the count down date
			var distance = countDownDate - now;

			// Time calculations for days, hours, minutes and seconds
			var days = Math.floor(distance / (1000 * 60 * 60 * 24));
			var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
			var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
			var seconds = Math.floor((distance % (1000 * 60)) / 1000);

			// Display the result in the element with id="demo"
			// document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
			// console.log( days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
			$('#remaining_d').html(days);
			$('#remaining_h').html(hours);
			$('#remaining_m').html(minutes);

			// If the count down is finished, write some text
			if (distance < 0) {
				clearInterval(x);
				$('#remaining_d').html(0);
				$('#remaining_h').html(0);
				$('#remaining_m').html(0);
				// document.getElementById("demo").innerHTML = "EXPIRED";
			}
		}, 1000);

		function change_cover_img() {

			var images_url = "<?= $imagesPath; ?>";
			var srcCoverImg = "";
			var srcHeaderImg = "";

			if($(window).width() >= 1024) { 
				srcCoverImg = images_url + 'cover_desktop.jpg';
				srcHeaderImg = "<?= $headerDesktop; ?>";
			} else {
				srcCoverImg = images_url + 'cover_mobile.jpg';
				srcHeaderImg = "<?= $headerMobile; ?>";
			}
			$(".cover__image").attr("src", srcCoverImg);
			$(".header__row").css('background-image', srcHeaderImg);
		}

		$(window).resize(function() {

			change_cover_img();
		});

		$("#btn-cover").on('click', function () {
			$(".cover").addClass("cover__destroy");
			$('body').css('overflow-y', 'scroll');

			$(".cover").css('z-index', 0);

			togglePlay();
		});

		var myAudio = document.getElementById("song");
		var isPlaying = false;

		function togglePlay() {
			if (isPlaying === true) {
				myAudio.pause();
				$('.icons-song').removeClass('bi-pause-circle').addClass('bi-play-circle');
			} else {
				myAudio.play();
				$('.icons-song').removeClass('bi-play-circle').addClass('bi-pause-circle');
			}
		};

		myAudio.onplaying = function() {
			isPlaying = true;
		};
		myAudio.onpause = function() {
			isPlaying = false;
		};

		$(".pause-song").on('click', function () {

			togglePlay();
		});

		/**************************************************** Animation ****************************************************/
		
		var secHeader 			= document.getElementById("sec-header");
		var secHeaderProlog 	= document.getElementById("sec-header-prolog");
		var secRecipient 		= document.getElementById("sec-header-recipient");
		var secContentHead 		= document.getElementById("sec-content-head");
		var secContentBodyP1 	= document.getElementById("sec-content-body-p1");
		var secContentBodyP2 	= document.getElementById("sec-content-body-p2");
		var secRemaining 		= document.getElementById("sec-remaining");
		var secEventProlog 		= document.getElementById("sec-event-prolog");
		var secEventDate 		= document.getElementById("sec-event-date");
		var secEventAkad 		= document.getElementById("sec-event-akad");
		var secEventResepsi 	= document.getElementById("sec-event-resepsi");

		$(document).ready( function () {

			window.scrollTo({top: 0, behavior: 'smooth'});
			$('body').css('overflow-y', 'hidden');

			change_cover_img();

			// init();

			setTimeout(() => {
				$("#btn-cover").addClass('heartbeat');
			}, 4000);
		});

		window.addEventListener("scroll", function() {

			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 1400)) {
				$(".event__date").addClass('border-lr');
			}

			// callAnimationDefault();
			// callAnimationContent();
			// callAnimationEvent();
			// callAnimationRemaining();
		});

		function init() {
			
			$(".header_prolog__content").css('opacity', 0);

			$(".recipient__name").css('opacity', 0);

			$(".content__head__body").css('opacity', 0);

			$(".person").css('opacity', 0);
			$(".person_name").css('opacity', 0);
			$(".person_parent").css('opacity', 0);

			$(".event__prolog__title").css('opacity', 0);
			$(".event__prolog__content").css('opacity', 0);

			$("#remaining__btn").css('opacity', 0);

			$(".event__akad__title").css('opacity', 0);
			$(".event__akad__time").css('opacity', 0);
			$(".event__akad__place").css('opacity', 0);
			$(".event__akad__address").css('opacity', 0);
			$(".event__akad a").css('opacity', 0);

			$(".event__resepsi__title").css('opacity', 0);
			$(".event__resepsi__time").css('opacity', 0);
			$(".event__resepsi__place").css('opacity', 0);
			$(".event__resepsi__address").css('opacity', 0);
			$(".event__resepsi a").css('opacity', 0);

			$(".remaining__date").css('opacity', 0);
			$(".remaining__col").css('opacity', 0);
			$(".remaining__btn").css('opacity', 0);
		}

		function callAnimationDefault() {
			
			if (window.scrollY > (secHeader.offsetTop + 150)) {
				$(".header_prolog__content").addClass('scale-in-center');
			}

			if (window.scrollY > (secHeader.offsetTop + 200)) {
				$(".recipient__name").addClass('text-focus-in');
			}
		}

		function callAnimationContent() {
		
			if (window.scrollY > (secHeaderProlog.offsetTop + 75)) {
				$(".content__head__body").addClass('scale-in-center');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 100)) {
				$("#sec-content-body-p1 .person").addClass('scale-in-center');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 200)) {
				$("#sec-content-body-p1 .person_name").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 175)) {
				$("#sec-content-body-p1 .person_parent").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 300)) {
				$("#sec-content-body-p2 .person").addClass('scale-in-center');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 350)) {
				$("#sec-content-body-p2 .person_name").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secHeaderProlog.offsetTop + 375)) {
				$("#sec-content-body-p2 .person_parent").addClass('slide-in-bottom');
			}
		}

		function callAnimationRemaining() {
		
			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 500)) {
				$(".remaining__date").addClass('tracking-in-contract');
			}
		
			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 550)) {
				$("#remaining__col1").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 600)) {
				$("#remaining__col2").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 650)) {
				$("#remaining__col3").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 700)) {
				$("#remaining__btn").addClass('slide-in-bottom');
			}
		}

		function callAnimationEvent() {
		
			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 1300)) {
				$(".event__prolog__title").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 1350)) {
				$(".event__prolog__content").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + 100)) {
				$(".event__akad__title").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + 150)) {
				$(".event__akad__time").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + 200)) {
				$(".event__akad__place").addClass('slide-in-bottom');
				$(".event__akad__address").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + 150)) {
				$(".event__akad a").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + secRemaining.offsetHeight + 100)) {
				$(".event__resepsi__title").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + secRemaining.offsetHeight + 150)) {
				$(".event__resepsi__time").addClass('slide-in-bottom');
			}

			if (window.scrollY > (secRemaining.offsetTop + secRemaining.offsetHeight + 200)) {
				$(".event__resepsi__place").addClass('slide-in-bottom');
				$(".event__resepsi__address").addClass('slide-in-bottom');
			}
			if (window.scrollY > (secRemaining.offsetTop + secRemaining.offsetHeight + 250)) {
				$(".event__resepsi a").addClass('slide-in-bottom');
			}
		}

	</script>

@endsection

