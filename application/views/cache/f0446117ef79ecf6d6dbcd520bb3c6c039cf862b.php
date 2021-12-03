<?php $__env->startSection('header'); ?>
	
	<section class="header" id="sec-header">

		<div class="row header__row"></div>
		
		<div class="header__box">
			<div class="header__name"><?php echo e($brideName1); ?> & <?php echo e($brideName2); ?></div>
			<div class="header__date"><?php echo e($resepsiDay); ?><br><?php echo e($resepsiDate); ?></div>
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
	
	<section class="recipient" id="sec-recipient">
		<?php echo $__env->make('Home.views.partial_detail.recipient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content">
		<?php echo $__env->make('Home.views.partial_detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="remaining" id="sec-remaining">
		<?php echo $__env->make('Home.views.partial_detail.remaining', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="event">
		<?php echo $__env->make('Home.views.partial_detail.event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="absent">

		<?php echo $__env->make('Home.views.partial_detail.absent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/index.blade.php ENDPATH**/ ?>