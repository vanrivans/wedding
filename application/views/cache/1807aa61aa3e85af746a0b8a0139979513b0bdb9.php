<?php echo $__env->make('Layouts.config._css-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Status</th>
        <th>Kirim</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Ree</td>
        <td>Belum Dikirim</td>
		<td>
			<a href="<?php echo e($chat); ?>" target="_blank" class="btn btn-block" style="background-color: rgb(0, 114, 17);"><i class="bi-whatsapp"></i> SEND</a>
		</td>
    </tr>
    <tr>
        <td>Van</td>
        <td>Belum Dikirim</td>
        <td><a href="" class="btn disabled">Send</a></td>
    </tr>
    </tbody>
</table>


<?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/test.blade.php ENDPATH**/ ?>