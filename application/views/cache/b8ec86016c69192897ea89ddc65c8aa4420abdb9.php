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

        

        <h1 class="ff-mygym text-center" style="margin-bottom:1rem">BOOKING / RESERVATION</h1>
        <div class="text-center">
            <p style="padding: 0 2% 5% 2%;font-size: 1em;font-weight:600" class="m-0">
                For booking, you must register and orientation,<br>
                please
                <span>
                    <a href="<?= base_url('register'); ?>" class="clr-orange bolded">click here to register and orientation</a>
                </span>
            </p>
        </div>

        
        <?php echo $__env->make('Booking.views.partial_detail.gym-access', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    
    </form>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<style>
    .booking-check {
        display: none !important;
    }
</style>

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

    $('.singledate').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        autoApply: true,
        autoUpdateInput: true, 
        minYear: 1901,
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

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/index.blade.php ENDPATH**/ ?>