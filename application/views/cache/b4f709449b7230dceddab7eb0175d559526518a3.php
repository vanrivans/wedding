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
        <h5 class="mb-3">Already have an account? <a href="<?php echo e(base_url('booking/login')); ?>" class="clr-orange bolded">login here</a></h5>
        <h1 class="text-center ff-mygym">REGISTER</h1>

            <center>
            <h4 class="font-header-title font-roboto-green-growers bolded ">
                Personal Information
            </h4>

            <form id="form-register" enctype="multipart/form-data">

                <?php echo $__env->make('Register.views.partial_detail.Form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div style="margin-bottom:5%">
                    <button type="submit" class="btn center btn-md">
                        <span class="btn__inner btn-md">SUBMIT</span>
                    </button>
                </div>

            </form>
            </center>

        </div>

    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

        $('.singledate').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });
    
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
        
    });
    
    $('#btn-date').on('click', function () {
        $('.singledate').focus();
    });

    $('input[name="suffix]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
    
    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            $('#icon-password').removeClass('bi-eye').addClass('bi-eye-slash');
        } else {
            x.type = "password";
            $('#icon-password').removeClass('bi-eye-slash').addClass('bi-eye');
        }
    }

    $("#form-register").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";

        $.ajax({
            url: apiAddress + 'register',
            type: "post",
            data: new FormData(this), 
            contentType: false, 
            cache: false, 
            processData: false, 
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
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/register.blade.php ENDPATH**/ ?>