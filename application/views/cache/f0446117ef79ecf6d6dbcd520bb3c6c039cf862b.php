<?php $__env->startSection('header'); ?>
	
	<section class="header" id="sec-header">

		<div class="row header__row"></div>
		
		<div class="header__box">
			<div class="header__name"><?php echo e($brideName1); ?> & <?php echo e($brideName2); ?></div>
			<div class="header__date"><?php echo e($resepsiDay); ?><br><?php echo e($resepsiDate); ?></div>
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
	
	<section class="recipient" id="sec-recipient">
		<?php echo $__env->make('Home.views.partial_detail.recipient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="content" id="sec-content">
		<?php echo $__env->make('Home.views.partial_detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="remaining" id="sec-remaining">
		<?php echo $__env->make('Home.views.partial_detail.remaining', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<center>
	<section class="event" id="sec-event">
		<?php echo $__env->make('Home.views.partial_detail.event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>
	</center>

	<center>
	<section class="absent">
		<?php echo $__env->make('Home.views.partial_detail.absent', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>
	</center>

	<section class="galleries" id="sec-galleries">
		<?php echo $__env->make('Home.views.partial_detail.galleries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<center>
	<section class="health_protocol">
		<div class="col-12" style="border: 2px solid var(--clr-secondary)">
			<?php echo $__env->make('Home.views.partial_detail.health_protocol', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>
	</section>
	</center>

	<center>
	<section class="wishes" id="sec-wishes">
		<?php echo $__env->make('Home.views.partial_detail.wishes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
							<img src="<?php echo e($templatePath . 'br-top-l.png'); ?>" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="<?php echo e($templatePath . 'br-top-r.png'); ?>" style="width:100%;height:100%">
						</div>
					</div>
					<span><?php echo e($brideName1); ?> & <?php echo e($brideName2); ?></span>
					<div class="row footer__border m-0">
						<div class="col-6 col-br-l">
							<img src="<?php echo e($templatePath . 'br-bot-l.png'); ?>" style="width:100%;height:100%">
						</div>
						<div class="col-6 col-br-r">
							<img src="<?php echo e($templatePath . 'br-bot-r.png'); ?>" style="width:100%;height:100%">
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
</center>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

	<script>
		
		$(document).ready( function () {

			var device 			= "<?= $device; ?>";
			var headerMobile 	= "<?= $headerMobile; ?>";
			var headerDesktop 	= "<?= $headerMobile; ?>";
			
			if (device == 1) {
				$('.header__row').css('background-image', headerMobile);
			} else {
				$('.header__row').css('background-image', headerDesktop);
			}
		});

	</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/index.blade.php ENDPATH**/ ?>