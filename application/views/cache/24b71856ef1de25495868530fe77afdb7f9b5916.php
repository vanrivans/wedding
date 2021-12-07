
	<div class="row remaining__row">
		<div class="col">
			<img src="<?php echo e($templatePath . 'mark-l.png'); ?>" class="remaining__mark mark-l">
			<div class="remaining__title">
				Catat Tanggalnya
			</div>
			<div class="remaining__date">
				<?php echo e($resepsiDate); ?>

			</div>
			<img src="<?php echo e($templatePath . 'mark-r.png'); ?>" class="remaining__mark mark-r">
		</div>
		<div class="col-12" style="margin:5% 0">
			<center>
			<div class="row remaining__row2">
				<div class="col remaining__col" id="remaining__col1">
					<center>
					<div class="remaining__box">
						<span class="remaining__time" id="remaining_d">0</span><br>
						<span class="remaining__text">Hari</span>
					</div>
					</center>
				</div>
				<div class="col remaining__col" id="remaining__col2">
					<center>
					<div class="remaining__box">
						<span class="remaining__time" id="remaining_h">0</span><br>
						<span class="remaining__text">Jam</span>
					</div>
					</center>
				</div>
				<div class="col remaining__col" id="remaining__col3">
					<center>
					<div class="remaining__box">
						<span class="remaining__time" id="remaining_m">0</span><br>
						<span class="remaining__text">Menit</span>
					</div>
					</center>
				</div>
			</div>
			</center>
		</div>
		<div class="col-12" id="remaining__btn">
			<a href="<?php echo e($addToCalendar); ?>" target="_blank" rel="nofollow" class="btn">
				<span class="btn__inner btn-add-to-calendar">Tambahkan di Kalender</span>
			</a>
		</div>
	</div>
<?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/partial_detail/remaining.blade.php ENDPATH**/ ?>