<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="trainer">
    <div class="container" style="max-width:1034px">
        <div class="row">
            <div class="col-md-12" style="padding-top:15%;padding-bottom:5%;min-height:450px;">
                <?php echo $__env->make('Trainers.views.partial_detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
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
            get_list_trainer();
        });

        function get_list_trainer() {

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'trainer',
                type: "get",
                dataType: "json",
                success: function (response) {

                    if (response.Status == 200) {   
                        var html = '';

                        for (i = 0; i < response.data.length; i++) {

                            html += append_list_trainers(response.data[i]);
                        }

                        $('#list-trainers').html(html);
                    }
                }
            });
        }

        function append_list_trainers(data) {
            var id = data['id_trainer'];
            var nickname = data['nickname'];
            var photo = data['photo'];
            var link = "<?= base_url(); ?>trainer-bio/" + id;

            var html = '';

            html += '<li class="post__item">';
                html += '<center>';
                    html += '<a href="' + link + '">';
                        html += '<div class="post__inner">';
                            html += '<div class="card card-trainer" style="width: 18rem;">';
                                html += '<img src="' + photo + '" class="card-img-top" alt="image personal trainer gym ' + nickname + '">';
                                html += '<div class="card-body">';
                                    html += '<p class="card-text card-trainer-text">' + nickname + '</p>';
                                html += '</div>';
                            html += '</div>';
                        html += '</div>';
                    html += '</a>';
                html += '</center>';
            html += '</li>';

            return html;
        }

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Trainers/views/index.blade.php ENDPATH**/ ?>