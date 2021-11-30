<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<section class="first-view" id="firstView">
    <div class="container">
        <?php echo $__env->make('Layouts.banners.banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="top-concept">
    <div class="container">
        <?php echo $__env->make('Home.views.partial_detail.top_concept', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>

<section class="top-blog">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Home.views.partial_detail.top_blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<section class="top-booking">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Home.views.partial_detail.top_booking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<section class="top-movie">
    <?php echo $__env->make('Home.views.partial_detail.top_movie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</section>

<section class="top-about" id="about">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Home.views.partial_detail.top_about', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<section class="top-contact" id="contact">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Home.views.partial_detail.top_contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<section class="top-find" id="find">
    <div class="container" style="max-width:1034px">
        <?php echo $__env->make('Home.views.partial_detail.top_find', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <?php echo $__env->make('Home.views.partial_detail._js-thumbnail-carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('Home.views.partial_detail._js-form-contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $(document).ready( function () {
            get_web_info();
            get_concept();
            get_main_video();
            get_about();
            get_find();
        });

        function get_concept() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'concept',
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var img = response.data['image'];
                        var title = response.data['title'];
                        var description = response.data['description'];
                    
                        var html = '';
                        html += '<div class="top-concept__img">';
                            html += '<img src="' + img + '" alt="mygym concept" title="mygym concept">';
                        html += '</div>';
                        html += '<div class="top-concept__content">';
                            html += '<h3 class="top-concept__subtitle">' + title + '</h3>';
                            // html += '<h4 class="top-concept__inner-title">あなたの身体は<br>あなたが食べたものでできている</h4>';
                            html += '<div class="top-concept__desc">' + description + '</div>';
                        html += '</div>';

                        $('#concept').html(html);
                    }
                }
            });
        }

        function get_blog(response) {
            var html = '';
                        
            for (i = 0; i < response.data.length; i++) {

                html += append_list_blog(response.data[i]);
            }

            $('#latest-blog').html(html);
        }

        function get_main_video() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'main-video',
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var video = response.data[0]['blog']['video'];
                        $('#top-movie').attr('src', video);
                    }
                }
            });
        }

        function get_about() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'about-us',
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var img = response.data['image'];
                        var title = response.data['title'];
                        var desc = response.data['about_us'];

                        $('#about-img').html('<img src="' + img + '" alt="mygym image" title="mygym image" id="about-img">');
                        $('#about-title').html(title);
                        $('#about-desc').html(desc);
                    }
                }
            });
        }

        function get_find() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'find-us',
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {

                        var html = '';

                        for (i = 0; i < response.data.length; i++) {

                            var img = response.data[i]['image'];
                            var title = response.data[i]['title'];
                            var text = response.data[i]['text'];
                            var link = response.data[i]['url'];

                            html += '<li class="top-find__item">';
                                html += '<div class="top-find__img-wrap">';
                                    html += '<div class="top-find__img">';
                                        html += '<img src="' + img + '" alt="mygym image ' + title + '" title="mygym image ' + title + '">';
                                    html += '</div>';
                                html += '</div>';
                                html += '<div class="top-find__content">';
                                    html += '<h3 class="top-find__subtitle">' + title + '</h3>';
                                    html += '<p class="top-find__desc">' + text + '</p>';
                                    html += '<a target="_blank" href="' + link + '" class="top-find__btn">VIEW MORE</a>';
                                html += '</div>';
                            html += '</li>';
                        }

                        $('#find-list').html(html);
                    }
                }
            });
        }

        $(".first-view__btn").click(function() {
            $('html, body').animate({
                scrollTop: $("#top-movie").offset().top
            }, 2000);
        });

    </script>

    <!-- <?php echo $__env->make('Home.views.partial_detail._js-form-contact', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Home/views/index.blade.php ENDPATH**/ ?>