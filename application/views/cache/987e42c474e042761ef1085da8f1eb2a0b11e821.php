<h2 class="top-booking__title" aria-label="Blog">
    <span class="ff-mygym title-mygym">BOOKING / RESERVATION</span>
</h2>
<div class="row mt-5">
    <div class="col-md-10 offset-md-1">
        <a href="<?= base_url('register'); ?>">
        <div class="card-group">
            <div class="card card-booking" style="flex:unset;background-color:#000!important">
                <span class="clr-red bolded text-package ff-mygym">ORIENTATION</span>
            </div>
            <div class="card card-booking">
                <img src="<?php echo e(base_url('assets/images/booking/booking-orientation-black.webp')); ?>" class="card-img-top" alt="mygym booking orientation" title="mygym booking orientation" id="booking-orientation-img">
                <!-- <span class="bolded text-package ff-mygym" style="color:#fff;position:absolute;width:100%">FREE // 30 minutes //</span><br>
                <span class="text-package" style="position: absolute;color: #fff;padding-top: 15%;width: 100%;font-size: 23px;">Monday - Friday | 02.00 - 04.00 pm</span> -->
                <span class="bolded text-package">
                    <label class="clr-white ff-mygym">FREE // 30 minutes //</label>
                    <label class="sub-ff-mygym" style="color:#fff;font-size:26px">Monday - Friday</label>
                </span>
            </div>
        </div>
        </a>
        <a href="<?= base_url('booking'); ?>">
        <div class="card-group">
            <div class="card card-booking">
                <img src="<?php echo e(base_url('assets/images/booking/booking-package-1-black.webp')); ?>" class="card-img-top" alt="mygym booking package a" title="mygym booking package a" id="booking-package-a-img">
                <span class="bolded text-package">
                    <label class="clr-red ff-mygym">PACKAGE A</label>
                    <label style="color:#fff">¥ 30,000</label>
                    <label style="color:#fff;font-size:26px">10 hours</label>
                </span>
            </div>
            <div class="card card-booking">
                <img src="<?php echo e(base_url('assets/images/booking/booking-package-2-black.webp')); ?>" class="card-img-top" alt="mygym booking package b" title="mygym booking package b" id="booking-package-b-img">
                <span class="bolded text-package">
                    <label class="clr-red ff-mygym">PACKAGE B</label>
                    <label style="color:#fff">¥ 60,000</label>
                    <label style="color:#fff;font-size:26px">11 hours</label>
                </span>
            </div>
            <div class="card card-booking">
                <img src="<?php echo e(base_url('assets/images/booking/booking-package-3-black.webp')); ?>" class="card-img-top" alt="mygym booking package c" title="mygym booking package c" id="booking-package-c-img">
                <span class="bolded text-package">
                    <label class="clr-red ff-mygym">PACKAGE C</label>
                    <label style="color:#fff">¥ 120,000</label>
                    <label style="color:#fff;font-size:26px">42 hours</label>
                </span>
            </div>
        </div>
        </a>
    </div>
</div><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Home/views/partial_detail/top_booking.blade.php ENDPATH**/ ?>