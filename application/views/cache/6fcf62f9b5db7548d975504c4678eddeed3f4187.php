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
                    
                    <h1 class="text-center ff-mygym">EDIT PROFILE</h1>

                    <center>
                    <h2 style="padding-top:2%;display:table;width:100%">
                        <span style="width:90%;display:table-cell">
                            Personal Information
                        </span>
                    </h2>
                    </center>

                    <form id="form-update" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $id_sess; ?>">

                        <?php echo $__env->make('Profile.views.partial_detail.Form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <div>
                            <button type="submit" class="btn center btn-md">
                                <span class="btn__inner btn-md">EDIT PROFILE</span>
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

    $('input[name="suffix"]').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    function get_profile() {

        var apiAddress = "<?= $apiAddress; ?>";
        var id_sess = "<?= $id_sess; ?>";

        if (id_sess == 0) {
            return false;
        }

        $.ajax({
            url: apiAddress + 'profile/' + id_sess,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    var first_name = response.data['first_name'];
                    var last_name = response.data['last_name'];
                    var birthdate = response.data['birthdate2'];
                    var gender = response.data['gender'];
                    var genderValue = response.data['gender_value'];
                    var email = response.data['email'];
                    var suffix = response.data['suffix'];
                    var prefix = response.data['prefix'];
                    var address = response.data['address'];
                    var image = response.data['image'];
                    var id_number = response.data['identity_number'];
                    var id_type = response.data['identity_type'];

                    $('#first_name').val(first_name);
                    $('#last_name').val(last_name);
                    $('#birthdate').val(birthdate);
                    $('#gender').val(gender);
                    $('#email').val(email);
                    $('#address').val(address);
                    $('#suffix').val(suffix);
                    $('#prefix').val(prefix);
                    $('.profile-pic').attr('src', image);
                    $('#id_number').val(id_number);

                    if (id_type == 0) {
                        $('#id_number_type_1').attr('checked', true);
                    } else if (id_type == 1) {
                        $('#id_number_type_2').attr('checked', true);
                    }

                    if (genderValue == 1) {
                        var gender = 'Male';
                    } else {
                        var gender = 'Femail';
                    }
                    var option = '<option value="' + genderValue + '" selected>' + gender + '</option>';

                    $('#gender').prepend(option);
                }
            }
        });
    }

    $("#form-update").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";
        var id_user = "<?= $id_sess; ?>";

        if (id_user == 0) {
            return false;
        }

        $.ajax({
            url: apiAddress + 'update',
            type: "post",
            data: new FormData(this), 
            contentType: false, 
            cache: false, 
            processData: false, 
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.Status == 200) {
                    var image = response.data.image;
                    $.redirect('<?= base_url('home/reset_sess_from_profile') ?>', {image:image});
                } else if (response.Status == 202) {
                    alert(response.Message);
                }
            }
        });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Profile/views/index_edit.blade.php ENDPATH**/ ?>