<?php $__env->startSection('header'); ?>
	
	<section class="header" id="sec-header">

	</section>

	<section class="header_prolog" id="sec-header-prolog">

		<div class="row">
			<div class="col-xs-12">
				<p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untumu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya. dan Dia menjadikan di antaramu rasa kasih dan sayang. (Ar-rum: 21)"</p>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
	
	<?php echo $__env->make('Home.views.partial_detail.recipient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<section class="content">
		<?php echo $__env->make('Home.views.partial_detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

	<section class="remaining" id="sec-remaining">
		
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
					<span><?php echo e($resepsiDay); ?></span><br>
					<span><?php echo e($resepsiDate); ?></span>
				</div>
			</div>

			<div class="col-xs-12">

				<div class="event__akad" id="sec-event-akad">

					<div class="event__akad__title title_style">
						Akad Keluarga
					</div>
					<div class="event__akad__time">
						<?php echo e($akadTime); ?>

					</div>
					<div class="event__akad__place mb-2">
						<?php echo e($akadPlace); ?>

					</div>
					<p class="event__akad__address">
						<?php echo e($akadAddress); ?>

					</p>
					<a href="<?php echo e($akadLoc); ?>" target="_blank">
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
						<?php echo e($resepsiTime); ?>

					</div>
					<div class="event__resepsi__place mb-2">
						<?php echo e($resepsiPlace); ?>

					</div>
					<p class="event__resepsi__address">
						<?php echo e($resepsiAddress); ?>

					</p>
					<a href="<?php echo e($resepsiLoc); ?>" target="_blank">
						<button class="btn">
							<span class="btn__inner btn_maps">Lihat Maps</span>
						</button>
					</a>

				</div>

			</div>

		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/index.blade.php ENDPATH**/ ?>