<div class="menu" style="transition: none 0s ease 0s;display:none">
    <div class="menu__col">
        <div class="menu__img">
            <img src="<?php echo e(base_url('assets/images/body/menu.webp')); ?>" alt=" " title=" " style="object-position: right">
        </div>
    </div>
    <div class="menu__col menu__scrollable">
        <div class="menu__content">
            <strong class="menu__logo">
                <a href="<?php echo e(base_url()); ?>" class="menu__logo-link">
                    <?php echo $__env->make('Layouts.icons._icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </a>
            </strong>
            <div class="menu__nav-wrap">
                <nav class="menu__nav">
                    <ul class="menu__nav-list">
                        <li class="menu__nav-item">
                            <a href="<?php echo e(base_url()); ?>" class="menu__nav-link">HOME</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="<?php echo e(base_url('journals')); ?>" class="menu__nav-link">JOURNALS</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="<?php echo e(base_url('booking')); ?>" class="menu__nav-link">BOOKING</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="<?php echo e(base_url('personal_trainer')); ?>" class="menu__nav-link">PERSONAL TRAINER</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="javascript:void(0)" id="link-about" class="menu__nav-link">ABOUT US</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="javascript:void(0)" id="link-find" class="menu__nav-link">FIND US</a>
                        </li>
                        <li class="menu__nav-item">
                            <a href="javascript:void(0)" id="link-contact" class="menu__nav-link">CONTACT</a>
                        </li>
                    </ul>
                </nav>
                <!-- <ul class="menu__brand-list">
                    <li class="menu__brand-item">
                        <a target="_blank" href="https://www.usmh.co.jp" class="menu__brand-link">United Super Markets Holdings</a>
                    </li>
                    <li class="menu__brand-item">
                        <a target="_blank" href="https://www.maruetsu.co.jp/" class="menu__brand-link">MARUETSU</a>
                    </li>
                    <li class="menu__brand-item">
                        <a target="_blank" href="https://www.kasumi.co.jp/" class="menu__brand-link">KASUMI</a>
                    </li>
                    <li class="menu__brand-item">
                        <a target="_blank" href="https://www.mv-kanto.co.jp/" class="menu__brand-link">MaxValu Kanto</a>
                    </li>
                    <li class="menu__brand-item">
                        <a target="_blank" href="https://www.plantx.co.jp" class="menu__brand-link">PLANTEX</a>
                    </li>
                </ul> -->
            </div>
            <div class="menu__social">
                <span class="menu__social-mark">Follow Us On</span>
                <ul class="menu__social-list m-0">
                    <li class="menu__social-item">
                        <a target="_blank" class="menu__social-link twitter-link">
                            <svg width="39.044" height="39.045" viewBox="0 0 39.044 39.045">
                                <use xlink:href="#twitter-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="menu__social-item">
                        <a target="_blank" class="menu__social-link youtube-link">
                            <svg width="39.063" height="39.063" viewBox="0 0 39.068 39.068">
                                <use xlink:href="#youtube-icon"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="menu__social-item">
                        <a target="_blank" class="menu__social-link instagram-link">
                            <svg width="39.063" height="39.063" viewBox="0 0 39.063 39.063">
                                <use xlink:href="#instagram-icon"></use>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Layouts/config/_menu.blade.php ENDPATH**/ ?>