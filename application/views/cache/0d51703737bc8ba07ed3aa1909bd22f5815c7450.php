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
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="mygym mark" style="transform: scale(2)">
                </span>
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="mygym mark" style="transform: scale(2)">
                </span>
                <span class="login__mark rellax" style="transform: translate3d(0px, -11.03%, 0px);">
                    <img src="<?php echo e(base_url('assets/images/body/mark_02.webp')); ?>" alt="mygym mark" style="transform: scale(1.5)">
                </span>

                <div class="col-md-6 offset-md-3" style="padding:2%;">

                    <h1 class="text-center ff-mygym">PROFILE</h1>

                    <?php echo $__env->make('Profile.views.partial_detail.Form_read', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <a href="<?= base_url('logout'); ?>" class="btn center btn-md">
                        <span class="btn__inner btn-md">LOGOUT</span>
                    </a>

                </div>

                <div class="col-md-6 offset-md-3" style="padding:2%">
                    <input type="hidden" id="match-or-date" value="0">
                    <input type="hidden" id="match-or-time" value="0">
                    <?php echo $__env->make('Ticket.views.orientation.Form_reschedule', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <div class="col-md-8 offset-md-2" style="padding:2%">
                    <h1 class="text-center ff-mygym mb-5">TICKET</h1>
                    <div class="padding-bottom: 5%" id="ticket-booking"></div>
                    <div class="padding-bottom: 5%" id="ticket-orientation"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if($status == 0): ?> 
    <style>
        .col-form-booking {
            display: block !important;
        }
    </style>
    <?php endif; ?>
    
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

        $('#orientation-date').val('');

		var qrcode = "<?= $qrcode; ?>";

		if (qrcode != '') {
			alert('Transaction success');
			send_email(qrcode, '');
		}
    });

    function get_profile() {

        var apiAddress = "<?= $apiAddress; ?>";
        var id_sess = "<?= $id_sess; ?>";

        if (id_sess == 0) {
            return false;
        }
        
        $.ajax({
            url: apiAddress + '/profile/' + id_sess,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    var first_name = response.data['first_name'];
                    var last_name = response.data['last_name'];
                    var birthdate = response.data['birthdate'];
                    var gender = response.data['gender'];
                    var email = response.data['email'];
                    var phone = response.data['phone'];
                    var address = response.data['address'];
                    var image = response.data['image'];

                    $('#full_name_txt').html(first_name + ' ' + last_name);
                    $('#birthdate_txt').html(birthdate);
                    $('#gender_txt').html(gender);
                    $('#email_txt').html(email);
                    $('#phone_txt').html(phone);
                    $('#address_txt').html(address);
                    $('.profile-pic').attr('src', image);

                    $('#orientation-id').val('0');
                    $('#user-id').val(id_sess); 

                    get_booking(apiAddress, id_sess);
                    get_orientation(apiAddress, id_sess);
                }
            }
        });
    }

    function get_orientation(apiAddress, id_sess) {

        $.ajax({
            url: apiAddress + '/ticket/orientation/' + id_sess,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    var data = response.data;
                    var html = '';

                    for (i = 0; i < data.length; i++) {
                        
                        var orientation_id = data[i]['id_orientation'];
                        var orientation_code = data[i]['qr_code'];
                        var orientation_date = data[i]['orientation_date'];
                        var orientation_time = data[i]['orientation_time'];
                        var status = data[i]['status'];
                        var link = "<?= base_url('ticket'); ?>";

                        if (status == 'Expired' || status == 'Cancel') {
                            html += ticket_orientation_expired(link, orientation_code, orientation_date, orientation_time, status);
                        } else {
                            html += ticket_orientation_active(link, orientation_code, orientation_date, orientation_time, status);
                        }
                    }

                    $('#ticket-orientation').html(html);
                }
            }
        });
    }

    function get_booking(apiAddress, id_sess) {

        $.ajax({
            url: apiAddress + 'ticket/booking/' + id_sess,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    var data = response.data;
                    var html = '';

                    for (i = 0; i < data.length; i++) {
                        
                        var code = data[i]['code'];
                        var booking_package = data[i]['booking_package'];
                        var start_date = data[i]['start_date'];
                        var time_duration = data[i]['time_duration_real'];
                        var expired_date = data[i]['expired_date'];
                        var time_remain = data[i]['time_remain'];
                        var status = data[i]['status'];

                        var link = "<?= base_url('ticket'); ?>";

                        if (status == 'Expired' || status == 'Cancel') {
                            html += ticket_booking_expired(link, code, booking_package, start_date, expired_date, time_duration, time_remain, status);
                        } else {
                            html += ticket_booking_active(link, code, booking_package, start_date, expired_date, time_duration, time_remain, status);
                        }
                    }

                    $('#ticket-booking').html(html);
                }
            }
        });
    }

    function ticket_booking_active(link, code, booking_package, start_date, expired_date, time_duration, time_remain, status) {

        var html = '';
        html += '<a href="' + link + '/' + code + '">';
        html += '<div class="card ticket-list package-list p-2 mb-3">';
            html += '<div class="card-header text-center">';
                html += '<span class="ff-mygym fs-2">' + booking_package + '</span>';
            html += '</div>';
            html += '<div class="card-body text-center">';
                html += '<div class="fs-5">Start Date</div>';
                html += '<div class="fs-3 bolded">' + start_date + '</div>';
                html += '<div class="fs-5">Expired Date</div>';
                html += '<div class="fs-3 bolded">' + expired_date + '</div>';
                html += '<div class="fs-5">Duration</div>';
                html += '<div class="fs-3 bolded">' + time_duration + '</div>';
                html += '<div class="fs-5">Remaining</div>';
                html += '<div class="fs-3 bolded">' + time_remain + '</div>';
            html += '</div>';
        html += '</div>';
        html += '</a>';

        return html;
    }

    function ticket_booking_expired(link, code, booking_package, start_date, expired_date, time_duration, time_remain, status) {

        var html = '';
        html += '<a href="' + link + '/' + code + '">';
        html += '<div class="card ticket-list package-list expired p-2 mb-3">';
            html += '<div class="card-header text-center">';
                html += '<span class="ff-mygym fs-2">' + booking_package + '</span>';
                html += '<span class="fs-2 header-expired ff-roboto bolded">EXPIRED</span>';
            html += '</div>';
            html += '<div class="card-body text-center">';
                html += '<div class="fs-5">Start Date</div>';
                html += '<div class="fs-3 bolded">' + start_date + '</div>';
                html += '<div class="fs-5">Expired Date</div>';
                html += '<div class="fs-3 bolded">' + expired_date + '</div>';
                html += '<div class="fs-5">Duration</div>';
                html += '<div class="fs-3 bolded">' + time_duration + '</div>';
                html += '<div class="fs-5">Remaining</div>';
                html += '<div class="fs-3 bolded">' + time_remain + '</div>';
            html += '</div>';
        html += '</div>';
        html += '</a>';

        return html;
    }

    function ticket_orientation_active(link, orientation_code, orientation_date, orientation_time, status) {

        var html = '';
        html += '<a href="' + link + '/' + orientation_code + '">';
        html += '<div class="card ticket-list orientation-list p-2 mb-3">';
            html += '<div class="card-header text-center">';
                html += '<span class="ff-mygym fs-2">ORIENTATION</span>';

                if (status == 'Used') {
                    html += '<div class="fs-2 ff-roboto bolded">USED</div>';
                }

            html += '</div>';
            html += '<div class="card-body text-center">';
                html += '<div class="fs-5">Orientation Date</div>';
                html += '<div class="fs-3 bolded">' + orientation_date + '</div>';
                html += '<div class="fs-5">Orientation Time</div>';
                html += '<div class="fs-3 bolded">' + orientation_time + '</div>';
            html += '</div>';
        html += '</div>';
        html += '</a>';

        return html;
    }

    function ticket_orientation_expired(link, orientation_code, orientation_date, orientation_time, status) {
        
        var html = '';
        html += '<a href="' + link + '/' + orientation_code + '">';
        html += '<div class="card ticket-list orientation-list expired p-2 mb-3">';
            html += '<div class="card-header text-center">';
                html += '<span class="ff-mygym fs-2">ORIENTATION</span>';
                html += '<span class="fs-2 header-expired ff-roboto bolded">' + status.toUpperCase() + '</span>';
            html += '</div>';
            html += '<div class="card-body text-center">';
                html += '<div class="fs-5">Orientation Date</div>';
                html += '<div class="fs-3 bolded">' + orientation_date + '</div>';
                html += '<div class="fs-5">Orientation Time</div>';
                html += '<div class="fs-3 bolded">' + orientation_time + '</div>';
            html += '</div>';
        html += '</div>';
        html += '</a>';

        return html;
    }

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Profile/views/index.blade.php ENDPATH**/ ?>