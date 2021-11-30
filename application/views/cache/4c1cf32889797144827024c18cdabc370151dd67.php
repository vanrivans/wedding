
<script src="<?php echo e(base_url('vendor/components/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(base_url('assets/plugins/redirect/redirect.min.js')); ?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript">

    var mobileMax = window.matchMedia("(max-width: 1034px)") 

    $(document).ready( function () {

        loadingLogo();
        scrollToTop();
        scrollEffect();
        menu();
    });
    
    $(window).scroll(function() {
        scrollNavbar();
    });

    var lastScrollTop = 0;

    function loadingLogo() {
        <?php if($LoadingLogo): ?>

        setTimeout(function() {
            $(".load-start-background").css("opacity", "0");
            $(".load-start-background").css("transition", "0.85s linear all");
            $(".load-start-background").fadeOut("slow");
        }, 3000);

        <?php endif; ?>
    }

    function scrollToTop() {

        $('.scroll-to-top').click( function () {
            window.scrollTo({top: 0, behavior: 'smooth'});
        });
    }

    function scrollNavbar() {

        if (mobileMax.matches) {
            if ($(document).scrollTop() > 50) { 

                $(".fixed-top").css("background-color", "#f8f8f8"); 
                $(".fixed-top").css("transition", "0.75s linear all");
                $(".fixed-top").css("height", "60px");
            } else {
                
                $(".fixed-top").css("background-color", "transparent"); 
                $(".fixed-top").css("transition", "0.75s linear all");
                $(".fixed-top").css("height", "75px");
            }
        } else {
            if ($(document).scrollTop() > 50) { 

                $(".fixed-top").css("background-color", "#f8f8f8"); 
                $(".fixed-top").css("transition", "0.75s linear all");
                $(".fixed-top").css("height", "100px");

                $(".navbar-brand img").css("width", "75px");
                $(".navbar-brand img").css("transition", "0.75s linear all");

                $(".navbar-brand").css("top", "5px");
                $(".navbar-brand").css("left", "47.5%");
                $(".navbar-brand").css("transition", "0.75s linear all");
            } else {
                
                $(".fixed-top").css("background-color", "transparent"); 
                $(".fixed-top").css("transition", "0.75s linear all");
                $(".fixed-top").css("height", "168px");
                
                $(".navbar-brand img").css("width", "90px");
                $(".navbar-brand img").css("transition", "0.75s linear all");

                $(".navbar-brand").css("left", "46.5%");
                $(".navbar-brand").css("top", "35px");
                $(".navbar-brand").css("transition", "0.75s linear all");
            }
        }
    }

    function scrollEffect() {
        var lastScrollTop = 0;

        document.addEventListener("scroll", function(){ 
            var st = window.pageYOffset || document.documentElement.scrollTop; 
            
            if (st > lastScrollTop){
                // downscroll code
                $('.rellax').css('transform', 'translate3d(0, -'+(lastScrollTop/100)+'%, 0)');
            } else {
                // upscroll code
                $('.rellax').css('transform', 'translate3d(0, -'+(lastScrollTop/100)+'%, 0)');
            }
            lastScrollTop = st <= 0 ? 0 : st;
        }, false);
    }

    function menu() {
        $('#btn-hamburger').click( function () {

            if ($(this).hasClass('active')) {
                hideMenu();
            } else {
                $('body').css('overflow-y', 'hidden');
                $('.navbar-nav').css('opacity', '0');
                $('.navbar-nav').css('transition', '0.85s linear all');

                $('.navbar-brand').css('opacity', '0');
                $('.navbar-brand').css('transition', '0.85s linear all');

                $('.header__social').css('opacity', '0');
                $('.header__social').css('transition', '0.85s linear all');

                $('.header__mail-to').css('opacity', '0');
                $('.header__mail-to').css('transition', '0.85s linear all');

                $('.header__user').css('opacity', '0');
                $('.header__user').css('transition', '0.85s linear all');

                $('.menu').css('display', 'flex');
                $('.menu').css('-webkit-animation', 'scale-up-ver-bottom 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both');
                $('.menu').css('animation', 'scale-up-ver-bottom 0.4s cubic-bezier(0.390, 0.575, 0.565, 1.000) both');
                
                $(".fixed-top").css("background-color", "transparent"); 
                $(".fixed-top").css("transition", "0.75s linear all");

                $('.header__hamburger').addClass('active');
            }
        }); 
    }

    function hideMenu() {
        $('body').css('overflow-y', 'auto');

        $('.navbar-nav').css('opacity', '1');
        $('.navbar-nav').css('transition', '0.85s linear all');

        $('.navbar-brand').css('opacity', '1');
        $('.navbar-brand').css('transition', '0.85s linear all');

        $('.header__social').css('opacity', '1');
        $('.header__social').css('transition', '0.85s linear all');

        $('.header__mail-to').css('opacity', '1');
        $('.header__mail-to').css('transition', '0.85s linear all');

        $('.header__user').css('opacity', '1');
        $('.header__user').css('transition', '0.85s linear all');

        $('.menu').css('-webkit-animation', 'scale-down-ver-top 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both');
        $('.menu').css('animation', 'scale-down-ver-top 0.4s cubic-bezier(0.250, 0.460, 0.450, 0.940) both');

        $('.header__hamburger').removeClass('active');
    }

    $('#link-about').on('click', function () {
        $('.menu').css('display', 'none');

        hideMenu();
        location.href = '<?= base_url(); ?>#about';
    });

    $('#link-contact').on('click', function () {
        $('.menu').css('display', 'none');

        hideMenu();
        location.href = '<?= base_url(); ?>#contact';
    });

    $('#link-find').on('click', function () {
        $('.menu').css('display', 'none');

        hideMenu();
        location.href = '<?= base_url(); ?>#find';
    });

    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);

    $('#orientation-date').daterangepicker({
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
        $('#orientation-date').focus();
    });

    $('.btn-time-orientation').on('click', function () {
        $('#orientation-time').focus();
    });

    $('#orientation-date').on('change', function () {
        var apiAddress = "<?= $apiAddress;?>";

        var param = $(this).val();
        var orDate = $('#match-or-date').val();
        var orTime = $('#match-or-time').val();

        $.ajax({
            url: apiAddress + 'orientation-time/' + param,
            type: "get",
            success: function(response) {
                if (response.Status == 200) {

                    var data = response.data;
                    var html = '<option value="" selected disabled>Start Time</option>';
                    for (i = 0; i < data.length; ++i) {
                        var status = data[i]['status'];
                        var disabled = '';

                        if (status == 0) {
                            disabled = 'disabled';
                        }

                        if (orDate != 0 && orTime != 0) {
                            if (orDate == param && orTime == data[i]['time']) {
                                disabled = 'disabled';
                            }
                        }

                        html += '<option value="' + data[i]['id_orientation_time'] + '" ' + disabled + '>' + data[i]['time'] + '</option>';
                    }
                    $('#orientation-time').html(html);
                }
            }
        });
    });

    
    $("#form-reschedule").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";

        $.ajax({
            url: apiAddress + 'reschedule',
            type: "post",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {
                    alert(response.Message);
                    send_email(response.data['qrcode'], 'profile');
                } else {
                    alert(response.Message);
                }
            }
        });
    });

    function send_email(qrcode, param) {
        
        var apiAddress = "<?= $apiAddress;?>";

        $.ajax({
            url: apiAddress + 'send-email/' + qrcode,
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

					if (param != '') {
                    	location.href = "<?= site_url('" + param + "'); ?>";
					}
                }
            }
        });
    }

    function get_uri_segment(url) {
        var segments = url.split('/');

        slug = segments[5];
        return slug;
    }

    function number_format(x, decimal = false) {
        var dcml;
        if(decimal == true){
            dcml = 2;
        }else{
            dcml = 0;
        }
        number = parseFloat(x).toFixed(dcml).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        //str = 'Rp ' + number;
        return number;
    }

</script>
<?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/config/_js-link.blade.php ENDPATH**/ ?>