<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="booking" style="padding-top:12.5%">
    <div class="container" style="max-width:1034px">

        <?php echo $__env->make('Booking.views.partial_detail.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="col-md-6 offset-md-3" style="padding:2%;">

        <h1 class="text-center ff-mygym">LOGIN</h1>

            <center>
                <form id="form-login">
                    <?php echo $__env->make('Login.views.partial_detail.form-login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                    <div class="text-center mb-5">
                        <p style="padding: 5% 2% 2% 2%;font-size: 1em;font-weight:600">
                            If you don’t have an account,<br>
                            please
                            <span>
                                <a href="<?= base_url('booking/register'); ?>" class="clr-orange bolded">register here</a>
                            </span>
                        </p>
                    </div>
                    <button type="submit" class="btn center btn-md" style="margin-bottom:5%">
                        <span class="btn__inner btn-md">LOGIN</span>
                    </button>
                </form>
            </center>

        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">

    $(document).ready( function () {

        var meta = {
                    title : '',
                    description : '',
                    keywords : '',
                    author : '',
                    site_name : ''
        };

        get_web_info(meta);

        $('#booking-2').attr("src", "<?=base_url('assets/images/icon/icon-booking-step-2-active.webp');?>");
        $('#timeline-2').html('LOGIN WEBSITE');
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
                    $.redirect('<?= base_url('home/set_sess_from_booking') ?>', {id_user:id_user, image:image});
                } else {
                    alert(response.Message);
                }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/login.blade.php ENDPATH**/ ?>