<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<section class="caption single-posts">
    <div class="caption__top"></div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>
<section class="single-post header-scroll-action">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Blog.views.partial_detail.top_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <a href="<?php echo e(base_url('journals')); ?>" class="btn center mt-4">
            <span class="btn__inner">JOURNALS</span>
        </a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $(document).ready( function () {

            var url = window.location.href;
            var slug = get_uri_segment(url);

            get_blog_by_slug(slug);
        });

        function get_blog_by_slug(slug) {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'detail/' + slug,
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var title = response.data[0]['blog']['title'];
                        var description = response.data[0]['blog']['description'];
                        var thumb = response.data[0]['blog']['thumbnail'];

                        var publish = response.data[0]['date_publish'];
                        publish = publish.replace(/-/g, '.');
                        var category = response.data[0]['blog']['category'];
                        
                        var altThumb = response.data[0]['seo']['alt_text'];
                        var titleThumb = response.data[0]['seo']['title_thumbnail'];
                        
                        $('#blog-title').html(title);
                        $('#blog-category').html(category);
                        $('#blog-thumb').html('<img src="' + thumb + '" alt="' + altThumb + '" title="' + titleThumb + '">');
                        $('#blog-publish').html(publish);
                        $('#blog-desc').html(description);

                        // var seoTitle = response.data[0]['seo']['seo_title'];
                        // var seoKey = response.data[0]['seo']['keyword'];
                        // var seoDesc = response.data[0]['seo']['meta_description'];

                        var meta = {};

                        get_web_info(meta);
                    }
                }
            });
        }   

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Blog/views/index.blade.php ENDPATH**/ ?>