<?php
$CI = &get_instance();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
    <meta name="theme-color" content="#006352" />
    <!-- URL Theme Color untuk Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#006352" />
    <!-- URL Theme Color untuk iOS Safari -->
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="initial-scale=1, user-scalable=no" />
    <meta name="author" content="">
    <meta property="og:url" content="" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:site_name" content="" />
    <meta name="geo.placename" content="" />
    <meta name="Keywords" content="">
    <meta name="description" content="">
    <title><?php echo e($PageTitle); ?></title>
    <link rel="shortcut icon" href="<?php echo e(base_url('assets/images/logo/logo-optik-sari-small.png')); ?>"/>
    <link href="<?php echo e(base_url('assets/images/logo/logo-optik-sari-small.png')); ?>" rel='icon' type='image/x-icon'/>

    
    <?php echo $__env->make('Layouts.config._css-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body>

    <main>
        <div class="container-fluid p-0">

            <?php echo $__env->yieldContent('navbar-div'); ?>
            <?php echo $__env->yieldContent('header-div-page'); ?>

        </div>

        <div class="container-fluid">

            <div class="row">

                <div class="col-md-12">

                    <?php echo $__env->yieldContent('main'); ?>

                </div>

            </div>

        </div>

    </main>

    <script src="<?php echo e(base_url('vendor/components/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    
    <?php echo $__env->make('Layouts.config._js-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <?php echo $__env->yieldContent('script'); ?>

</html><?php /**PATH E:\xampp\htdocs\optiksari\application\modules/Layouts/layout.blade.php ENDPATH**/ ?>