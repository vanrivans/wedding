
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script type="text/javascript">

	$(document).ready( function () {

		change_cover_img();
	});

	$(window).resize(function() {

		change_cover_img();
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

</script>
<?php /**PATH E:\xampp\htdocs\wedding\application\modules/Layouts/config/_js-link.blade.php ENDPATH**/ ?>