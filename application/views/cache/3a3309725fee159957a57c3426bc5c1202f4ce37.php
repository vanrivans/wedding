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
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="author" content="mygym">
    <meta property="og:url" content="" />
    <meta property="og:title" content="<?= empty($PageTitle) ? '' : $PageTitle; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= empty($SiteName) ? '' : $SiteName; ?>" />
    <meta name="geo.placename" content="" />
    <meta name="Keywords" content="<?= empty($MetaKeywords) ? '' : $MetaKeywords; ?>">
    <meta name="description" content="<?= empty($MetaDescription) ? '' : $MetaDescription; ?>">

    <title><?= empty($PageTitle) ? '' : $PageTitle; ?></title>

    <link rel="shortcut icon" href="<?=base_url('assets/images/logo/logo.png'); ?>" />
    <link href="<?=base_url('assets/images/logo/logo.png'); ?>" rel='icon' type='image/x-icon'/>

    
    <?php echo $__env->make('Layouts.config._css-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body style="overflow-x:hidden">

    <?php if($LoadingLogo): ?>

    <?php echo $__env->make('Layouts.config._loading', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php endif; ?>


    
    <div class="container-fluid p-0">

        <div class="row">

            <div class="col-md-12 p-0">

                <div class="container-fluid p-0">
                    <?php echo $__env->yieldContent('navbar-div'); ?>
                </div>
                
                <div class="container-fluid p-0">
                    <?php echo $__env->yieldContent('header-div-page'); ?>
                    <?php echo $__env->make('Layouts.config._menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            
                <?php echo $__env->yieldContent('main'); ?>

            </div>

        </div>

    </div>

    
    <?php echo $__env->make('Layouts.config._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('Layouts.config._js-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('script'); ?>
    
</body>
</html><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/layout.blade.php ENDPATH**/ ?>