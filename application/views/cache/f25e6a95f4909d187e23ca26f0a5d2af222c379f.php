<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-top:10%;padding-bottom:5%;min-height:450px;">
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

                    <h1 class="text-center ff-mygym">TICKET</h1>
                    <div id="detail-ticket"></div>
                    <div>
                        <button type="submit" class="btn center btn-md" id="btn-reschedule" style="display: none">
                            <span class="btn__inner btn-md">RESCHEDULE</span>
                        </button>
                    </div>

                    <div class="col-md-12 col-form-booking d-none" style="padding:5% 0">
                        <form id="form-reschedule">
                        <input type="hidden" name="id_orientation" id="orientation-id">
                        <input type="hidden" name="id_user" id="user-id">
                        <h3 class="ff-mygym m-0 lh-1" style="font-size:36px">SELECT YOUR START DATE</h3>
                        <span><b>Lorem ipsum dolor sit amet</b></span>
                        <div class="row mt-3 mb-3">
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text booking-form btn-date-orientation"><i class="bi-calendar3"></i></span>
                                    <input name="date" type="text" class="form-control booking-form orientation" placeholder="Start Date" aria-label="Start Date" id="orientation-date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text booking-form btn-time-orientation"><i class="bi-clock"></i></span>
                                    <select name="id_time" class="form-control booking-form" id="orientation-time" required>
                                        <option selected value="" disabled style="font-style:italic">Start Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn center btn-md">
                                <span class="btn__inner btn-md">SUBMIT</span>
                            </button>
                        </div>
                        </form>
                    </div>
                    
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
        get_ticket();

        $('#orientation-date').val('');
    });

    $('#btn-reschedule').on('click', function () {
        $('.col-form-booking').removeClass('d-none').addClass('d-block');
    });
    
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('#orientation-date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        autoUpdateInput: true, 
        minDate: moment(today).add(1,'days'),
        maxYear: parseInt(moment().format('YYYY'),10),
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    $('.btn-date-orientation').on('click', function () {
        $('#orientation-date').focus();
    });

    $('.btn-time-orientation').on('click', function () {
        $('#orientation-time').focus();
    });

    $('#orientation-date').on('change', function () {
        var apiAddress = "<?= $apiAddress;?>";

        var param = $(this).val();

        $.ajax({
            url: apiAddress + 'orientation-time/' + param,
            type: "get",
            success: function(response) {
                if (response.Status == 200) {

                    var data = response.data;
                    var html = '';
                    for (i = 0; i < data.length; ++i) {
                        html += '<option value="' + data[i]['id_orientation_time'] + '">' + data[i]['time'] + '</option>';
                    }
                    $('#orientation-time').append(html);
                }
            }
        });
    });

    function get_ticket() {
        var qr_code = "<?= $qr_code; ?>";
        var apiAddress = "<?= $apiAddress; ?>";

        $.ajax({
            url: apiAddress + 'ticket-detail/orientation/' + qr_code,
            type: "get",
            success: function (response) {

                if (response.Status == 200) {

                    var data = response.data;
                    var orientation_id = data['id_orientation'];
                    var user_id = data['id_user'];
                    var date_default = data['date_default'];
                    var orientation_date = data['orientation_date'];
                    var orientation_time = data['orientation_time'];
                    var orientation_code = data['code'];
                    var qrcode = data['qrcode'];
                    var status = data['status'];
                    var expired = '';

                    if (status == 'Expired' || status == 'Cancel') {
                        expired = 'expired';
                    }

                    if (date_default == 1) {
                        $('#btn-reschedule').css('display', 'none');
                    } else {
                        $('#btn-reschedule').css('display', 'block');
                    }

                    $('#orientation-id').val(orientation_id);
                    $('#user-id').val(user_id);

                    var html = '';

                    html += '<div class="card ticket-list orientation-list ' + expired + ' p-2 mb-3">';
                        html += '<div class="card-body text-center">';
                            html += '<h2 class="ff-mygym fs-2">ORIENTATION TICKET</h2>';

                            if (expired != '') {
                                html += '<div class="fs-2 ff-roboto bolded">' + status.toUpperCase() + '</div>';
                                $('#btn-reschedule').css('display', 'none');
                            }

                            html += '<div class="fs-5 mt-4">Orientation Date</div>';
                            html += '<div class="fs-4 bolded">' + orientation_date + '</div>';
                            html += '<div class="fs-5">Orientation Time</div>';
                            html += '<div class="fs-4 bolded">' + orientation_time + '</div>';
                            
                            if (expired == '') {
                                html += '<img src="' + qrcode + '" alt="mygym ticket ' + orientation_code + '" title="mygym ticket ' + orientation_code + '">';
                            }
                            html += '<div class="fs-4 bolded">' + orientation_code + '</div>';
                        html += '</div>';
                    html += '</div>';
                    
                    $('#detail-ticket').html(html);

                } else if (response.Status == 404) {
                    location.href = "<?= base_url('404_override'); ?>";
                }
            }
        });
    }

    $("#form-reschedule").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";

        $.ajax({
            url: apiAddress + 'reschedule',
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    alert(response.Message);
                    location.href = "<?= base_url('profile'); ?>";
                } else {
                    alert(response.Message);
                }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Ticket/views/index.blade.php ENDPATH**/ ?>