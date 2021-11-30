<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>
<section class="register">
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

                <div class="col-md-6 offset-md-3" style="padding:2%;">

                    <h1 class="text-center ff-mygym">REGISTER</h1>

                    <center>
                    <h4 class="font-header-title font-roboto-green-growers bolded ">
                        Personal Information
                    </h4>

                    <form id="form-register" enctype="multipart/form-data" autocomplete="off">

                        <?php echo $__env->make('Register.views.partial_detail.Form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div>
                            <button type="submit" class="btn center btn-md">
                                <span class="btn__inner btn-md">SUBMIT</span>
                            </button>
                        </div>

                    </form>
                    </center>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

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
        $('#orientation-date').val('');

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
                    alert(response.Message);
                    location.href = "<?= base_url('login'); ?>";
                } else {
                    alert(response.Message);
                }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Register/views/index.blade.php ENDPATH**/ ?>