<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<section class="caption blog">
    <?php echo $__env->make('Layouts.banners.banner-default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="post blog">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Blogs.views.partial_detail.top_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('Blogs.views.partial_detail.middle_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $(document).ready( function () {

            var meta = {
                        title : '',
                        description : '',
                        keywords : '',
                        author : '',
                        site_name : ''
            };

            get_web_info(meta);
            get_blog_category();
            get_list_blogs();
        });

        function get_blog_category() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'category',
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var html = '';

                        for (i = 0; i < response.data.length; i++) {

                            var id = response.data[i]['id'];
                            var category = response.data[i]['name'];

                            html += '<li class="post__category-item">';
                                html += '<a href="javascript:void(0)" onclick="get_list_blogs(' + id + ', 1)" class="post__category-link" id="category-' + id + '">' + category + '</a>';
                            html += '</li>';
                        }

                        $('#blog-category').html(html);
                    }
                }
            });
        }

        function get_list_blogs(category = 0, page = 1) {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'blogs/' + category + '/' + page,
                type: "get",
                dataType: "json",
                success: function (response) {

                    if (response.Status == 200) { 

                        var html = '';
                        var totalPage = response.page['total_page'];
                        var currentPage = response.page['current_page'];
                        var nextPage = response.page['next_page'];
                        var prevPage = response.page['previous_page'];
                        
                        if (category == 0) {
                            $('.post__category-link').removeClass('active');
                        } else {
                            $('.post__category-link').removeClass('active');
                            $('#category-' + category).addClass('active');
                        }

                        if (totalPage == 0) {
                            html += '<li class="post__item"><div class="post__inner"><h4>We are thinking about this. Be available soon!</h4></div></li>';
                        } else {
                            for (i = 0; i < response.data.length; i++) {

                                html += append_list_blog(response.data[i]);
                            }
                        }

                        $('#list-blogs').html(html);
                        get_pagination(category, totalPage, currentPage, nextPage, prevPage);

                        element = document.getElementById("list-blogs");
                        element.scrollIntoView(); 
                    }
                }
            });
        }

        function get_pagination(category, totalPage, currentPage, nextPage, prevPage) {
            
            var html = '';

            if (totalPage == 0) {
                $('.pagination').html('');
            } else {

                for (i = 1; i <= totalPage; i++) {

                    if (i == currentPage) {
                        html += '<li class="pagination__item">';
                            html += '<span aria-current="page" class="page-numbers current">' + i + '</span>';
                        html += '</li>';
                    } else {

                        html += '<li class="pagination__item">';
                            html += '<a class="page-numbers" href="javascript:void(0)" onclick="get_list_blogs(' + category + ', ' + i + ')">' + i + '</a>';
                        html += '</li>';
                    }
                }
                
                $('.pagination__list').html(html);
                
                $('.pagination__start').attr('onclick', 'get_list_blogs(' + category + ', 1)');
                $('.pagination__end').attr('onclick', 'get_list_blogs(' + category + ', ' + totalPage + ')');

                $('.pagination__prev').attr('onclick', 'get_list_blogs(' + category + ', ' + prevPage + ')');
                $('.pagination__next').attr('onclick', 'get_list_blogs(' + category + ', ' + nextPage + ')');
            }
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Blogs/views/index.blade.php ENDPATH**/ ?>