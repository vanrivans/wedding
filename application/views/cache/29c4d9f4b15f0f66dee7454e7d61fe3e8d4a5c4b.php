<div class="set-row-top-green-growers">

    <div class="get-top-banner-blog">

        <?php if($url == 'Home'): ?>
        <div class="home-banner" style="background-image:url('<?= base_url('assets/images/home/carousel_1.jpeg'); ?>');">
            <div class="row row-banner">
                <div class="col-lg-12">
                    <div class="font-menu-banner-center-2">身体は食べたものでできている</div>
                    <div class="font-menu-banner-center">You are what you eat</div>
                    <img class="logo-home-white" src="<?= base_url('assets/images/logo/logo_white.png'); ?>">
                </div>
            </div>
        </div>

        <?php endif; ?>

    </div>

    <?php if($url == 'Home'): ?>

    <div class="row row-thumbnail">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-9 col-thumbnail">
            <div class="box-link">
                <div class="info-text-vertical">
                    <small class="font-small-vertical-info">JOURNALS</small>
                </div>
                <div class="info-box blog-box-link">
                </div>
            </div>
        </div>
        <div class="col-xs-3 col-lets-play-mini">
            <img src="<?= base_url('assets/images/icon/lets_play.png'); ?>" class="lets-play-mini">
        </div> 

        <!--<div class="col-lg-1 col-md-1"></div>-->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-9 col-thumbnail">
            <div class="box-link">
                <div class="info-text-vertical">
                    <small class="font-small-vertical-info">RECIPES</small>
                </div>
                <div class="info-box recipe-box-link">   
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-3 text-right col-thumbnail-video" style="padding-right:0">
            <!-- <img src="<?= base_url('assets/images/home/VIDEO_THUMBNAIL.png'); ?>" class="video-thumbnail"> -->
            <img src="<?= base_url('assets/images/icon/lets_play.png'); ?>" class="lets-play" alt="greengrowers">
            <div id="video-thumbnail">
            </div>
        </div>
    </div>
    <?php endif; ?>

</div>
<?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/banner-home/banner.blade.php ENDPATH**/ ?>