<script>
    
    $(document).ready( function () {
        $(window).scroll(function() { 
            if ($(document).scrollTop() > 50) { 
                $('.fixed-top').removeClass('bg-transparent').addClass('bg-white');
            } else {
                $('.fixed-top').removeClass('bg-white').addClass('bg-transparent');
            }
        });
    });
</script><?php /**PATH E:\xampp\htdocs\optiksari\application\modules/Layouts/config/_js-link.blade.php ENDPATH**/ ?>