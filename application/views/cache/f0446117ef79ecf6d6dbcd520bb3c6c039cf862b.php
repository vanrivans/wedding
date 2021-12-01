<?php $__env->startSection('header'); ?>
	
	<section class="header" id="sec-header">

	</section>

	<section class="header_prolog" id="sec-header-prolog">

		<div class="row">
			<div class="col-xs-12">
				<p>"Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untumu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya. dan Dia menjadikan di antaramu rasa kasih dan sayang. (Ar-rum: 21)</p>
			</div>
		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
	
	<?php echo $__env->make('Home.views.partial_detail.recipient', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<section class="content">

		<div class="content__head" id="sec-content-head">
			<div class="row">
				<div class="col-xs-12">
					<div class="content__head__title">Bismillahirrahmanirrahim</div>
					<p class="content__head__body">
						Assalamu'alaikum Warahmatullahi Wabarakaatuh<br>
						Maha Suci Allah yang telah menciptakan makhluk-Nya<br>
						berpasang-pasang<br>
						Ya Allah, perkenankanlah putra-putri kami:
					</p>
				</div>
			</div>
		</div>

		<div class="content__body">

			<div class="row">
				<div class="col-xs-12">
					<div class="content__body__person" id="sec-content-body-p1">
						<center>
						<div class="person">
							<img src="<?php echo e(base_url('assets/images/p1.jpg')); ?>" class="person__image" alt="" title="">
						</div>
						</center>
						<div class="person_name">
							<span class="person_name_style"><?php echo e($brideFullName1); ?></span>
							<div class="person_ig">
								<a href="<?php echo e($ig1); ?>"><span><i class="bi bi-instagram"></i> <?php echo e($brideIg1); ?></span></a>
							</div>
						</div>
						<div class="person_parent">
							<span>Putri dari,</span><br>
							<span>Bapak Drs. H. Setyawan Eko Cahyono, M.Si (Purna Kabag Umum Sekwan Kab. Ngawi) dan Ibu Hj. Siti Wafiroh, S.H (Kepala Unit BRI Kedunggalar)</span>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12">
					<div class="content__body__separator">
						<span class="content__body__separator__style">&</span>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12">
					<div class="content__body__person" id="sec-content-body-p2">
						<center>
						<div class="person">
							<img src="<?php echo e(base_url('assets/images/p2.jpg')); ?>" class="person__image">
						</div>
						</center>
						<div class="person_name">
							<span class="person_name_style"><?php echo e($brideFullName2); ?></span>
							<div class="person_ig">
								<a href="<?php echo e($ig2); ?>"><span><i class="bi bi-instagram"></i> <?php echo e($brideIg2); ?></span></a>
							</div>
						</div>
						<div class="person_parent">
							<span>Putra dari,</span><br>
							<span>Bapak Drs. H. Setyawan Eko Cahyono, M.Si (Purna Kabag Umum Sekwan Kab. Ngawi) dan Ibu Hj. Siti Wafiroh, S.H (Kepala Unit BRI Kedunggalar)</span>
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/index.blade.php ENDPATH**/ ?>