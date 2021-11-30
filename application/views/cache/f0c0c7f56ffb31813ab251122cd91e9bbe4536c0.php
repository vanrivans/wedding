<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

<div class="container-bar">
    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<div class="set-body-margin" style="padding:10% 5% 0% 5%;text-align:center">

<h1 class="bolded font-header-title" style="font-family:var(--mont-heavy);font-size:130px">404</h1>
<h3 class="bolded font-header-title" style="font-family:var(--mont-heavy);padding:0;margin:0">PAGE NOT FOUND</h3>
<a href="<?php echo e(base_url()); ?>" class="btn btn-md center mb-5" style="margin-top:50px"><span class="btn__inner">BACK TO HOME</span></a>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $(document).ready( function () {
        var url = window.location.href;
        var slug = get_uri_segment(url);

        var getUrl = window.location.href; 
        $("meta[property='og:url']").attr("content", getUrl);

        get_web_info();
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Error_handler/views/index.blade.php ENDPATH**/ ?>