<footer class="footer">
    <button class="scroll-to-top" aria-hidden="true"></button>
    <!-- <div class="footer__brand">
        <div class="container">
            <ul class="footer__brand-list">
                <li class="footer__brand-item nth-1">
                    <a target="_blank" href="https://www.usmh.co.jp" class="footer__brand-link">
                        <img src="<?php echo e(base_url('assets/images/vendor/img_01.svg')); ?>" alt="U.S.M. Holdings">
                    </a>
                </li>
                <li class="footer__brand-item nth-3">
                    <a target="_blank" href="https://www.maruetsu.co.jp/" class="footer__brand-link">
                        <img src="<?php echo e(base_url('assets/images/vendor/img_03.svg')); ?>" alt="Maruetsu">
                    </a>
                </li>
                <li class="footer__brand-item nth-2">
                    <a target="_blank" href="https://www.kasumi.co.jp/" class="footer__brand-link">
                        <img src="<?php echo e(base_url('assets/images/vendor/img_02.svg')); ?>" alt="Kasumi">
                    </a>
                </li>
                <li class="footer__brand-item nth-4">
                    <a target="_blank" href="https://www.mv-kanto.co.jp/" class="footer__brand-link">
                        <img src="<?php echo e(base_url('assets/images/vendor/img_04.svg')); ?>" alt="MaxValu">
                    </a>
                </li>

                <li class="footer__brand-item nth-5">
                    <a target="_blank" href="https://www.plantx.co.jp" class="footer__brand-link">
                        <img src="<?php echo e(base_url('assets/images/vendor/img_05.jpeg')); ?>" alt="Plantx">
                    </a>
                </li>
            </ul>
        </div>
    </div> -->
    <div class="footer__banner">
        <div class="container">
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container" style="max-width:1034px">
            <div class="footer__social">
                <ul class="footer__social-list">
                    <li class="footer__social-item">
                        <a target="_blank" class="footer__social-link twitter-link">
                            <svg width="39.044" height="39.045" viewBox="0 0 39.044 39.045">
                                <use xlink:href="#twitter-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="footer__social-item">
                        <a target="_blank" class="footer__social-link youtube-link">
                            <svg width="39.063" height="39.063" viewBox="0 0 39.068 39.068">
                                <use xlink:href="#youtube-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="footer__social-item">
                        <a target="_blank" class="footer__social-link instagram-link">
                            <svg width="39.063" height="39.063" viewBox="0 0 39.063 39.063">
                                <use xlink:href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
            <strong class="footer__logo">
                <a href="<?php echo e(base_url()); ?>" class="footer__logo-link">
                    <?php echo $__env->make('Layouts.icons._icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </a>
            </strong>
            <nav class="footer__nav">
                <ul class="footer__nav-list">
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url('journals')); ?>" class="footer__nav-link">JOURNALS</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url('booking')); ?>" class="footer__nav-link">BOOKING</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url('personal_trainer')); ?>" class="footer__nav-link">PERSONAL TRAINER</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url()); ?>#about" data-anchor="" class="footer__nav-link">ABOUT US</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url()); ?>#find" data-anchor="" class="footer__nav-link">FIND US</a>
                    </li>
                    <li class="footer__nav-item">
                        <a href="<?php echo e(base_url()); ?>#contact" class="footer__nav-link">CONTACT</a>
                    </li>
                </ul>
            </nav>
            <!-- <a target="_blank" href="https://www.usmh.co.jp/about_site/privacypolicy" class="footer__privacy">プライバシーポリシー</a> -->
            <small class="footer__copyright">Copyright© mygym All rights reserved.</small>
        </div>
    </div>
</footer><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/config/_footer.blade.php ENDPATH**/ ?>