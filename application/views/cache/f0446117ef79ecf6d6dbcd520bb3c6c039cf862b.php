<?php $__env->startSection('header'); ?>
	
	<section class="header" id="sec-header">

	</section>

	<section class="header_prolog" id="sec-header-prolog">
		<?php echo $__env->make('Home.views.partial_detail.header-prolog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
		<?php echo $__env->make('Home.views.partial_detail.event', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/index.blade.php ENDPATH**/ ?>