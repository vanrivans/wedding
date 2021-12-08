<?php
$CI = &get_instance();
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
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

    <meta name="author" content="<?= empty($Author) ? '' : $Author; ?>">
    <meta name="Keywords" content="<?= empty($MetaKeywords) ? '' : $MetaKeywords; ?>">
    <meta name="description" content="<?= empty($MetaDescription) ? '' : $MetaDescription; ?>">

    <meta property="og:type" content="website" />

    <meta property="og:url" content="<?= empty($Url) ? '' : $Url; ?>" />
    <meta property="og:title" content="<?= empty($PageTitle) ? '' : $PageTitle; ?>" />
    <meta property="og:site_name" content="<?= empty($SiteName) ? '' : $SiteName; ?>" />
	<meta property="og:image" content="<?= empty($Image) ? '' : $Image; ?>">

    <title><?= empty($PageTitle) ? '' : $PageTitle; ?></title>

    <link rel="shortcut icon" href="<?php echo e(base_url('assets/logo/logo.png')); ?>" />
    <link href="<?php echo e(base_url('assets/logo/logo.png')); ?>" rel='icon' type='image/x-icon'/>

    
    <?php echo $__env->make('Layouts.config._css-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>
<body style="overflow-x:hidden">

	<?php echo $__env->yieldContent('navbar'); ?>

	<?php echo $__env->yieldContent('cover'); ?>

    
    <div class="container-fluid" style="z-index:1">

        <div class="row">

            <div class="col-12 p-0">
                
                <div class="container-fluid p-0">
                    <?php echo $__env->yieldContent('header'); ?>
                </div>
            
                <?php echo $__env->yieldContent('main'); ?>

            </div>

        </div>

    </div>

    
    <?php echo $__env->make('Layouts.config._footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->make('Layouts.config._js-link', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <?php echo $__env->yieldContent('script'); ?>
    
</body>
</html>
<?php /**PATH E:\xampp\htdocs\wedding\application\modules/Layouts/layout.blade.php ENDPATH**/ ?>