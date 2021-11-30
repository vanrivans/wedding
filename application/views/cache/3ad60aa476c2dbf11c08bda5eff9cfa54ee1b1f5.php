<script type="text/javascript">

    $(document).ready( function () {
        slideThumbnail();
    });

    var slideIndex1 = 0;
    var slideIndex2 = 0;

    function slideThumbnail() {
        var i;
        var j;

        var slides1 = document.getElementsByClassName("slide-1");
        var slides2 = document.getElementsByClassName("slide-2");

        for (i = 0; i < slides1.length; i++) {
            slides1[i].style.display = "none";
        }

        for (j = 0; j < slides2.length; j++) {
            slides2[j].style.display = "none";
        }

        slideIndex1++;
        slideIndex2++;

        if (slideIndex1 > slides1.length) {slideIndex1 = 1}   
        if (slideIndex2 > slides2.length) {slideIndex2 = 1}   

        slides1[slideIndex1-1].style.display = "flex";
        slides2[slideIndex2-1].style.display = "flex";

        setTimeout(slideThumbnail, 1500);
    }   
</script><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Home/views/partial_detail/_thumbnail-carousel.blade.php ENDPATH**/ ?>