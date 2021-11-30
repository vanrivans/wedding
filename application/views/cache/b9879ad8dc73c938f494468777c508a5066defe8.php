<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="login">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top:15%;padding-bottom:5%;min-height:450px;">
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="News mark" style="transform: scale(2)">
                </span>
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="News mark" style="transform: scale(2)">
                </span>
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="News mark" style="transform: scale(1.5)">
                </span>

                <div class="col-md-4 offset-md-4" style="padding:2%;">

                    <h1 class="text-center mb-5 ff-mygym">LOGIN</h1>
                    
                    <form id="form-login">
                    <?php echo $__env->make('Login.views.partial_detail.form-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <div class="text-center mb-5">
                        <p style="padding: 5% 2% 2% 2%;font-size: 1em;font-weight:600">
                            If you don’t have an account,<br>
                            please
                            <span>
                                <a href="<?= base_url('register'); ?>" class="clr-orange bolded">register here</a>
                            </span>
                        </p>
                    </div>
                    <button type="submit" class="btn center btn-md" style="margin-bottom:5%">
                        <span class="btn__inner btn-md">LOGIN</span>
                    </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>

    $(document).ready( function () {
        var meta = {
                    title : '',
                    description : '',
                    keywords : '',
                    author : '',
                    site_name : ''
        };

        get_web_info(meta);
    });

    $("#form-login").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";

        var email = $('#login-email').val();
        var password = $('#login-password').val();

        if (email == null || password == null) {
            return false;
        }

        $.ajax({
            url: apiAddress + 'login',
            type: "post",
            data: {
                email: email,
                password: password
            },
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    var id_user = response.data.id_user;
                    var image = response.data.image;
                    $.redirect('<?= base_url('home/set_sess') ?>', {id_user:id_user, image:image});
                } else {
                    alert(response.Message);
                }
            }
        });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Login/views/index.blade.php ENDPATH**/ ?>