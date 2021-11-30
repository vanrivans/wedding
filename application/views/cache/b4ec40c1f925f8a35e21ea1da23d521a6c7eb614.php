<div style="padding-bottom:5%;">

    <center class="upload-button mb-5 mt-5">
        <img class="img-responsive img-circle profile-pic" src="<?= $img_sess; ?>" alt="User profile picture gym">
    </center>

    <?php echo $__env->make('Profile.views.partial_detail.profile_data.Personal_Information', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Profile.views.partial_detail.profile_data.Account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</div><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Profile/views/partial_detail/Form_read.blade.php ENDPATH**/ ?>