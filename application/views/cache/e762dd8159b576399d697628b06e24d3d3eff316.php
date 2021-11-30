<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="booking" style="padding-top:12.5%">
    <form id="form-booking" autocomplete="off">
    <div class="container" style="max-width:1034px">

        <?php if($access == 1): ?>
        <?php echo $__env->make('Booking.views.partial_detail.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <h1 class="ff-mygym text-center" style="margin-bottom:3rem">BOOKING / RESERVATION</h1>

        <?php if($access == 0): ?>
        <div class="text-center">
            <p style="padding: 0 2% 5% 2%;font-size: 1em;font-weight:600" class="m-0">
                For booking, you must orientation before.
            </p>
        </div>
        <?php endif; ?>

        
        
        
        <?php echo $__env->make('Booking.views.partial_detail.gym-access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

    </div>

    <?php if($access == 1): ?>
    <?php echo $__env->make('Booking.views.partial_detail.total-payment', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    </form>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<?php if($access != 1): ?> 
<style>
    .booking-check {
        display: none !important;
    }
</style>
<?php endif; ?> 

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
        get_package();
        $('.singledate').val('');
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('.singledate').daterangepicker({
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
        $('.singledate.orientation').focus();
    });

    $('.btn-date-package').on('click', function () {
        $('.singledate.package').focus();
    });

    // $('td.available').on('click', function (ev, picker) {
    //     console.log(1);
    //     $(this).val(picker.startDate.format('L'));
    // });

    // $('.singledate.orientation').on('apply.daterangepicker', function (ev, picker) {
    //     $(this).val(picker.startDate.format('L'));
    // });

    // $('.singledate.orientation').on('cancel.daterangepicker', function (ev, picker) {
    //     $(this).val('');
    // });

    // $('.singledate.package').on('apply.daterangepicker', function (ev, picker) {
    //     $(this).val(picker.startDate.format('L'));
    // });

    // $('.singledate.package').on('cancel.daterangepicker', function (ev, picker) {
    //     $(this).val('');
    // });

    $("#form-booking").submit( function (e) {
        e.preventDefault();

        var packageStartDate = $('#package-date').val();
        var orientationStartDate = $('#orientation-date').val();
        var orientationTime = $('#orientation-time').val();
        var orientation = 0;

        if ($('#check-x').hasClass('active')) {
            orientation = 1;
            $('#orientation-date').attr('required', true);
            $('#orientation-time').attr('required', true);
        } else {
            $('#orientation-date').attr('required', false);
            $('#orientation-time').attr('required', false);
        }

        if ($('.card-package').hasClass('active')) {
            var packageId = $('#package-id').val();
            var packagePrice = $('#package-price').val();
            var packageName = $('#package-name').val();
            var packageDur = $('#package-duration').val();
            var packageDurReal = $('#package-duration-real').val();
            var packageExpired = $('#package-expired').val();
        } else {
            alert('Select package!');
            return false;
        }

        $.ajax({
            url: "<?php echo e(base_url('booking/set_order')); ?>",
            type: "post",
            data: {
                package_id: packageId,
                package_price: packagePrice,
                package_name: packageName,
                package_duration: packageDur,
                package_duration_real: packageDurReal,
                package_expired: packageExpired,
                package_start_date: packageStartDate,
                orientation_start_date: orientationStartDate,
                orientation_time: orientationTime,
                orientation: orientation
            },  
            cache: false, 
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    if (response.response == 1) {
                        location.href = "<?php echo e(base_url('booking/summary')); ?>";
                    } else {
                        location.href = "<?php echo e(base_url('booking/register')); ?>";
                    }
                }
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/select-program.blade.php ENDPATH**/ ?>