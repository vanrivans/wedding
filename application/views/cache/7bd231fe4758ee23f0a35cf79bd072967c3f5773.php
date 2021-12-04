<?php if($device === 1): ?>
<img src="<?php echo e(base_url('assets/images/cover_mobile.webp')); ?>" class="cover__image" alt="" title="">
<?php else: ?>
<img src="<?php echo e(base_url('assets/images/cover_desktop.jpg')); ?>" class="cover__image" alt="" title="">
<?php endif; ?>
<div class="cover__box">
	<div class="cover__opening">
		<span>UNDANGAN PERNIKAHAN</span>
	</div>
	<div class="cover__box__name">
		<span class="cover__name__style"><?php echo e($brideFullName1); ?></span><br>
		<span class="cover__name__style">&</span><br>
		<span class="cover__name__style"><?php echo e($brideFullName2); ?></span>
	</div>
	<div class="cover__to">
		<span>Teruntuk,</span><br>
		<span><?php echo e($recipient); ?></span>
	</div>
	<div class="cover__btn">
		<button class="btn" id="btn-cover">
			<span class="btn__inner" style="font-size:18px">Buka Undangan</span>
		</button>
	</div>
</div>
<?php /**PATH E:\xampp\htdocs\wedding\application\modules/Layouts/config/_cover.blade.php ENDPATH**/ ?>