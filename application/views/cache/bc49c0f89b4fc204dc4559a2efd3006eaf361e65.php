<script type="text/javascript">  

    function get_web_info(meta) {
        var apiAddress = "<?= $apiAddress;?>";
        var url = "<?= $url;?>";

        if (url != 'Home') {
            set_meta(meta);
        }

        $.ajax({
            url: apiAddress + '/web-info',
            type: "get",
            dataType: "json",
            success: function (response, meta) { 

                if (response.Status == 200) {

                    if (url == 'Home') {

                        var title = response.data['title'];
                        var metaDesc = response.data['meta_description'];
                        var metaKey = response.data['meta_keywords'];
                        var metaAuthor = response.data['meta_author'];

                        var siteName = response.data['site_name'];

                        // var meta = {
                        //                 title : title,
                        //                 description : metaDesc,
                        //                 keywords : metaKey,
                        //                 author : metaAuthor,
                        //                 site_name : siteName
                        // };

                        set_meta(meta);
                    }               

                    var fb_link = response.data['facebook_link'];
                    var ig_link = response.data['instagram_link'];
                    var twitter_link = response.data['twitter_link'];
                    var youtube_link = response.data['youtube_link'];

                    var medsos = {
                                    facebook: fb_link,
                                    instagram: ig_link,
                                    twitter: twitter_link,
                                    youtube: youtube_link
                    };

                    set_medsos_link(medsos);
                }
            }
        });
    }

    function set_meta(data = '') {
        var getUrl = window.location.href;

        /* Document Title */
        // document.title = data['title'];

        /* Meta */
        // $('meta[name="description"]').attr("content", data['description']);
        // $('meta[name="Keywords"]').attr("content", data['keywords']);
        // $('meta[name="Author"]').attr("content", data['author']);

        /* Meta Property */
        $("meta[property='og:url']").attr("content", getUrl);
        // $("meta[property='og:title']").attr("content", data['title']);
        // $("meta[property='og:site_name']").attr("content", data['site_name']);
    }

    function set_medsos_link(data) {

        $('.facebook-link').attr('href', data['facebook']);
        $('.instagram-link').attr('href', data['instagram']);
        $('.twitter-link').attr('href', data['twitter']);
        $('.youtube-link').attr('href', data['youtube']);
    }

    function append_list_blog(data) {

        var blogTitle = data['blog']['title'];
        var blogDesc = data['blog']['description'];
        var blogThumb = data['blog']['thumbnail'];
        var blogCategory = data['blog']['category'];
        var blogPublish = data['date_publish'];
        blogPublish = blogPublish.replace(/-/g, ".");

        var seoSlug = "<?php echo e(base_url('detail')); ?>/" + data['seo']['slug'];
        var seoTitle = data['seo']['seo_title'];
        var seoDesc = data['seo']['meta_description'];
        var seoKey = data['seo']['meta_keywords'];
        var seoAlt = data['seo']['alt_text'];
        var seoTitleThumb = data['seo']['title_thumbnail'];
        var seoCaptionThumb = data['seo']['caption_thumbnail'];

        var html = '';

        html += '<li class="post__item">';
            html += '<div class="post__inner">';
                html += '<a href="' + seoSlug + '" class="post__link">';
                    html += '<div class="post__img-wrap">';
                        html += '<div class="post__img">';
                            html += '<img src="' + blogThumb + '" alt="' + seoAlt + '" title="' + seoTitleThumb + '">';
                        html += '</div>';
                    html += '</div>';
                    html += '<div class="post__content">';
                        html += '<h4 class="post__title" title="' + blogTitle + '">' + blogTitle + '</h4>';
                        html += '<span class="post__date">' + blogPublish + '</span>';
                        html += '<div class="post__btn">Learn More</div>';
                    html += '</div>';
                html += '</a>';
                html += '<a href="' + seoSlug + '" class="post__name">' + blogCategory + '</a>';
            html += '</div>';
        html += '</li>';

        return html;
    }

</script><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Layouts/config/_get_data.blade.php ENDPATH**/ ?>