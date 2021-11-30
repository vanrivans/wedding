<script type="text/javascript">

    $(document).ready( function () {
        get_data_thumbnail();
    });

    function get_data_thumbnail() {
        var apiAddress = "<?= $apiAddress; ?>";

        $.ajax({
            url: apiAddress + 'latest/blog/3',
            type: "get",
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    var html = '';
                    html += '<div class="swiper-container first-view__post-slider swiper-container-fade swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events">';

                    for (i = 0; i < response.data.length; i++) {

                        var blogTitle = response.data[i]['blog']['title'];
                        var blogDesc = response.data[i]['blog']['description'];
                        var blogThumb = response.data[i]['blog']['thumbnail'];

                        var seoSlug = "<?php echo e(base_url('detail')); ?>/" + response.data[i]['seo']['slug'];
                        var seoTitle = response.data[i]['seo']['seo_title'];
                        var seoDesc = response.data[i]['seo']['meta_description'];
                        var seoKey = response.data[i]['seo']['meta_keywords'];
                        var seoAlt = response.data[i]['seo']['alt_text'];
                        var seoTitleThumb = response.data[i]['seo']['title_thumbnail'];
                        var seoCaptionThumb = response.data[i]['seo']['caption_thumbnail'];

                        var blogLink = '';
                                                    
                        html += '<a href="' + seoSlug + '" class="swiper-slide slide-2">';
                        html += '<div class="swiper-wrapper">';
                                html += '<div class="first-view__post-img-wrap">';
                                    html += '<div class="first-view__post-img">';
                                        html += '<img src="' + blogThumb + '" alt="' + seoAlt + '" title="' + seoTitle + '">';
                                    html += '</div>';

                                    html += '<div class="swiper-pagination swiper-pagination-bullets">';
                        
                                    for (j = 0; j < response.data.length; j++) {
                                        var active = '';
                                        if (i == j) {
                                            active = 'swiper-pagination-bullet-active';
                                        }
                                        html += '<span class="swiper-pagination-bullet ' + active + '"></span>';
                                    }

                                    html += '</div>';

                                html += '</div>';
                                html += '<div class="first-view__post-content">';
                                    html += '<h4 class="first-view__post-title" title="' + blogTitle + '">' + blogTitle + '</h4>';
                                    html += '<span class="first-view__post-btn" href="' + seoSlug + '">VIEW MORE</span>';
                                html += '</div>';
                        html += '</div>';
                        html += '</a>';
                    }

                    html += '</div>';

                    $('#blog-thumbnail').html(html);
                    slideThumbnail();
                    get_blog(response);
                }
            }
        });
    }

    // var slideIndex1 = 0;
    var slideIndex2 = 0;

    function slideThumbnail() {
        // var i;
        var j;

        // var slides1 = document.getElementsByClassName("slide-1");
        var slides2 = document.getElementsByClassName("slide-2");

        // for (i = 0; i < slides1.length; i++) {
        //     slides1[i].style.display = "none";
        // }

        for (j = 0; j < slides2.length; j++) {
            slides2[j].style.display = "none";
        }

        // slideIndex1++;
        slideIndex2++;

        // if (slideIndex1 > slides1.length) {slideIndex1 = 1}   
        if (slideIndex2 > slides2.length) {slideIndex2 = 1}   

        // slides1[slideIndex1-1].style.display = "flex";
        slides2[slideIndex2-1].style.display = "flex";

        setTimeout(slideThumbnail, 2000);
    }   
</script><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/partial_detail/_js-thumbnail-carousel.blade.php ENDPATH**/ ?>