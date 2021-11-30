<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top:15%;padding-bottom:5%;min-height:450px;">

                <div class="col-md-12">

                    <a href="<?= base_url('profile'); ?>" class="fw-650"
                    style="cursor:pointer;text-decoration:none;font-size:14pt;padding-left:2%;color:#CE5B2B">
                        <i class="bi-arrow-left"></i> Back
                    </a>
                </div>

                <div class="col-md-6 offset-md-3" style="padding:2%;">
                    
                    <h1 class="text-center ff-mygym mb-5">EDIT ACCOUNT</h1>

                    <form id="form-update">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $id_sess; ?>">

                        <?php echo $__env->make('Profile.views.partial_detail.Form_account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div>
                            <button type="submit" class="btn center btn-md">
                                <span class="btn__inner btn-md">EDIT ACCOUNT</span>
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
        get_profile();
    });

    function showPassword() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            $('#icon-password').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            x.type = "password";
            $('#icon-password').removeClass('fa-eye-slash').addClass('fa-eye');
        }
    }

    function matchingPassword() {
        
        var password = $('#password').val();
        var confirmPassword = $('#confirm-password').val();

        if (password != confirmPassword) {
            return 0;
        }

        return 1;
    }

    $("#form-update").submit( function (e) {
        e.preventDefault();
        
        var apiAddress = "<?= $apiAddress; ?>";
        var id_user = "<?= $id_sess; ?>";

        if (id_user == 0) {
            return false;
        }

        if (matchingPassword() == 0) {
            alert('Password not match!');
            return false;
        }

        $.ajax({
            url: apiAddress + 'update-password',
            type: "post",
            data: new FormData(this), 
            contentType: false, 
            cache: false, 
            processData: false, 
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    $.redirect('<?= base_url('profile') ?>');
                } else if (response.Status == 202) {
                    alert(response.Message);
                }
            }
        });
    });

    function get_profile() {

        var id_sess = "<?= $id_sess; ?>";

        if (id_sess == 0) {
            return false;
        }
        
        $.ajax({
            url: "https://www.mygreengrowers.com/en/dashboard/api/update-profile/" + id_sess,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    var first_name = response.data['profile']['first_name'];
                    var last_name = response.data['profile']['last_name'];
                    var birthdate = response.data['profile']['birth_date'];
                    var gender = response.data['profile']['gender'];
                    var email = response.data['profile']['email'];
                    var prefix_phone = response.data['profile']['prefix_phone'];
                    var suffix_phone = response.data['profile']['suffix_phone'];
                    var image = response.data['profile']['image'];

                    $('#first_name').val(first_name);
                    $('#last_name').val(last_name);
                    $('#birth_date').val(birthdate);
                    $('#prefix_phone').val(prefix_phone);
                    $('#suffix_phone').val(suffix_phone);
                    $('#email').val(email);
                    $('#img-edit-profile').attr('src', image);

                    if (gender == 1) {
                        var gender_txt = 'Male';
                    } else {
                        var gender_txt = 'Femail';
                    }
                    var option = '<option value="' + gender + '" selected>' + gender_txt + '</option>';

                    $('#gender').prepend(option);
                }
            }
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Profile/views/index_edit_account.blade.php ENDPATH**/ ?>