
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script type="text/javascript">

	$(document).ready( function () {

		window.scrollTo({top: 0, behavior: 'smooth'});
		$('body').css('overflow-y', 'hidden');

		change_cover_img();

		$(".person").css('opacity', 0);
		$(".person_name").css('opacity', 0);
		$(".person_parent").css('opacity', 0);

		$(".event__prolog__title").css('opacity', 0);
		$(".event__prolog__content").css('opacity', 0);
		$(".event__date").css('opacity', 0);

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

		setTimeout(() => {
			$("#btn-cover").addClass('heartbeat');
		}, 4000);
	});

	$(window).resize(function() {

		change_cover_img();
	});

	window.addEventListener("scroll", function() {
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

		if (window.scrollY > (secContentHead.offsetTop + secContentHead.offsetHeight)) {
			$("#sec-content-body-p1 .person").addClass('scale-in-center');
		}

		if (window.scrollY > (secContentHead.offsetTop + secContentHead.offsetHeight + 50)) {
			$("#sec-content-body-p1 .person_name").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentHead.offsetTop + secContentHead.offsetHeight + 100)) {
			$("#sec-content-body-p1 .person_parent").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP1.offsetTop + secContentBodyP1.offsetHeight + 100)) {
			$("#sec-content-body-p2 .person").addClass('scale-in-center');
		}

		if (window.scrollY > (secContentBodyP1.offsetTop + secContentBodyP1.offsetHeight + 150)) {
			$("#sec-content-body-p2 .person_name").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP1.offsetTop + secContentBodyP1.offsetHeight + 200)) {
			$("#sec-content-body-p2 .person_parent").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP1.offsetTop + secContentBodyP1.offsetHeight + 300)) {
			$(".event__prolog__title").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP1.offsetTop + secContentBodyP1.offsetHeight + 350)) {
			$(".event__prolog__content").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 150)) {
			$(".event__date").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 200)) {
			$(".event__akad__title").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 250)) {
			$(".event__akad__time").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 300)) {
			$(".event__akad__place").addClass('slide-in-bottom');
			$(".event__akad__address").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 350)) {
			$(".event__akad a").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 450)) {
			$(".event__resepsi__title").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 500)) {
			$(".event__resepsi__time").addClass('slide-in-bottom');
		}

		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 550)) {
			$(".event__resepsi__place").addClass('slide-in-bottom');
			$(".event__resepsi__address").addClass('slide-in-bottom');
		}
		if (window.scrollY > (secContentBodyP2.offsetTop + secContentBodyP2.offsetHeight + 600)) {
			$(".event__resepsi a").addClass('slide-in-bottom');
		}

	});

	function change_cover_img() {

		var base_url = "<?= base_url(); ?>assets/images/";
		var srcCoverImg = "";

		if($(window).width() >= 1024) { 
			srcCoverImg = base_url + 'cover_desktop.jpg';
		} else {
			srcCoverImg = base_url + 'cover_mobile.jpg';
		}
		$(".cover__image").attr("src", srcCoverImg);
	}

	function callAnimation() {
		
		$(".recipient__name").addClass('text-focus-in');
	}

	$("#btn-cover").on('click', function () {
		$(".cover").addClass("cover__destroy");
		$('body').css('overflow-y', 'scroll');
		
		callAnimation();

		$(".cover").css('z-index', 0);
	});
	

</script>
