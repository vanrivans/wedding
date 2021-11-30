<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="booking" style="padding-top:12.5%">
    <div class="container mb-5" style="max-width:1034px">

        <div class="col-md-12 mb-5">

            <a href="<?= base_url('booking/reset/1'); ?>" class="clr-orange bolded">
                <i class="bi-arrow-left"></i> Back to package
            </a>
        </div>

        <?php echo $__env->make('Booking.views.partial_detail.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-md-8 offset-md-2" style="padding:2%;">

            <h1 class="text-center ff-mygym mb-3">SUMMARY</h1>
            <?php echo $__env->make('Booking.views.partial_detail.summary', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>

    </div>
    <?php echo $__env->make('Booking.views.partial_detail.total-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        $('#booking-3').attr("src", "<?=base_url('assets/images/icon/icon-booking-step-3-active.webp');?>");

        summary();

    });

    function summary() {

        var orientation = "<?=$orientation;?>";
        var package_price = "<?=$package_price;?>";
        var package_name = "<?=$package_name;?>";
        var package_date_format = "<?=$package_date_format;?>";
        var package_duration = "<?= $package_duration; ?>";
        var package_expired = "<?= $package_expired; ?>";

        if (orientation == 0) {
            $('#summary-orientation').css('display', 'none');
        }

        $('#summary-package').html(package_name);
        $('#summary-package-info').html(package_duration + ' | Exp: ' + package_expired);
        $('#summary-total-payment').html(number_format(package_price, false));  
        $('#summary-package-price').html(number_format(package_price, false));
        $('#summary-package-date').html(package_date_format)

        $('#total-payment').html(number_format(package_price, false));
    }

    $('.btn-booking-continue').click( function () {

		location.href = "<?= base_url('Booking/payments'); ?>";

        // var apiAddress = "<?= $apiAddress; ?>";

        // var user_id = "<?= $id_sess; ?>";
        // var package_id = "<?= $package_id; ?>";
        // var duration = "<?= $package_duration_real; ?>";
        // var expired = "<?= $package_expired; ?>";
        // var package_date = "<?= $package_date; ?>";

        // $.ajax({
        //     url: apiAddress + 'booking-create',
        //     type: "post",
        //     data: {
        //         id_user: user_id,
        //         id_booking_package: package_id,
        //         duration: duration,
        //         expired: expired,
        //         start_date: package_date
        //     },
        //     success: function (response) {

        //         if (response.Status == 200) {
        //             alert(response.Message);
        //             send_email(response.data['qrcode'], 'booking/reset');
        //         }
        //     }
        // })
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/summary.blade.php ENDPATH**/ ?>