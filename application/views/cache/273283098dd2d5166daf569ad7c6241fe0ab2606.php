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
                
                <div class="col-md-12 mt-5">

                    <a href="<?= base_url('profile'); ?>" class="fw-650" style="cursor:pointer;text-decoration:none;font-size:14pt;padding-left:2%;color:#CE5B2B">
                        <i class="bi-arrow-left"></i> Back
                    </a>
                </div>

                <div class="col-md-6 offset-md-3 col-xs-12" style="padding:2%;">

                    <h1 class="text-center ff-mygym">TICKET</h1>
                    <div id="detail-ticket"></div>
                    <input type="hidden" id="match-or-date">
                    <input type="hidden" id="match-or-time">
                    
                    <div>
                        <button type="submit" class="btn center btn-md" id="btn-reschedule" style="display: none">
                            <span class="btn__inner btn-md">RESCHEDULE</span>
                        </button>
                    </div>

                    <?php echo $__env->make('Ticket.views.orientation.Form_reschedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    
                </div>

                <div class="col-md-8 offset-md-2 col-xs-12" style="padding:2%">
                    
                    <div id="orientation-usage"></div>
                    
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
        get_ticket();

        $('#orientation-date').val('');
    });

    $('#btn-reschedule').on('click', function () {
        $('.col-form-booking').removeClass('d-none').addClass('d-block');
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
                    var orientation_date_real = data['orientation_date_real'];
                    var orientation_time = data['orientation_time'];
                    var orientation_code = data['code'];
                    var qrcode = data['qrcode'];
                    var status = data['status'];
                    var expired = '';

                    $('#match-or-date').val(orientation_date_real);
                    $('#match-or-time').val(orientation_time);

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

                            if (status == 'Used') {
                                html += '<div class="fs-2 ff-roboto bolded">USED</div>';
                            }

                            html += '<div class="fs-5 mt-4">Orientation Date</div>';
                            html += '<div class="fs-4 bolded">' + orientation_date + '</div>';
                            html += '<div class="fs-5">Orientation Time</div>';
                            html += '<div class="fs-4 bolded">' + orientation_time + '</div>';
                            
                            if (expired == '') {
                                html += '<div class="row">';
                                    html += '<div class="col-md-6 offset-md-3 col-xs-12">';
                                        html += '<img src="' + qrcode + '" alt="mygym ticket ' + orientation_code + '" title="mygym ticket ' + orientation_code + '">';
                                    html += '</div>';
                                html += '</div>';
                            }
                            html += '<div class="fs-4 bolded">' + orientation_code + '</div>';
                        html += '</div>';
                    html += '</div>';
                    
                    $('#detail-ticket').html(html);
                    
                    get_ticket_usage();
                } else if (response.Status == 404) {
                    location.href = "<?= base_url('404_override'); ?>";
                }
            }
        });
    }

    function get_ticket_usage() {
        
        var qr_code = "<?= $qr_code; ?>";
        var apiAddress = "<?= $apiAddress; ?>";

        $.ajax({
            url: apiAddress + 'usage/orientation/' + qr_code,
            type: "get",
            success: function (response) {

                if (response.Status == 200) {

                    var data = response.data;

                    var scan_in     = data['scan_in'];
                    var scan_out    = data['scan_out'];
                    var dur         = data['duration_real'];

                    var html = '<h2 class="text-center ff-mygym">ORIENTATION USAGE</h2>';

                    html += '<div class="card ticket-list orientation-list p-2 mb-3">';
                        html += '<div class="card-body text-center">';
                            // html += '<h2 class="ff-mygym fs-2">ORIENTATION TICKET</h2>';

                            html += '<div class="fs-5">Scan In</div>';
                            html += '<div class="fs-4 bolded">' + scan_in + '</div>';
                            html += '<div class="fs-5">Scan Out</div>';
                            html += '<div class="fs-4 bolded">' + scan_out + '</div>';
                            html += '<div class="fs-5">Duration</div>';
                            html += '<div class="fs-4 bolded">' + dur + '</div>';
                            
                        html += '</div>';
                    html += '</div>';

                    $('#orientation-usage').html(html);

                }
            }
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Ticket/views/orientation/index.blade.php ENDPATH**/ ?>