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
                <?php echo $__env->make('Trainer.views.partial_detail.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a href="<?php echo e(base_url('personal_trainer')); ?>" class="btn center mt-4">
                    <span class="btn__inner">PERSONAL TRAINER</span>
                </a>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script type="text/javascript">

        $(document).ready( function () {

            var url = window.location.href;
            var slug = get_uri_segment(url);
            get_trainer_by_slug(slug);
        });

        function get_trainer_by_slug(slug) {
            console.log(slug);

            var apiAddress = "<?= $apiAddress;?>";

            $.ajax({
                url: apiAddress + 'trainer/' + slug,
                type: "get",
                dataType: "json",
                success: function (response) { 

                    if (response.Status == 200) {
                        
                        var id = response.data['id_trainer'];
                        var nickname = response.data['nickname'];
                        var fullname = response.data['fullname'];
                        var bio = response.data['bio'];
                        var qualification = response.data['qualification'];
                        var certification = response.data['certification'];
                        var photo = response.data['photo'];

                        $('#trainer-nickname').html(nickname);
                        $('#trainer-fullname').html(fullname);
                        $('#trainer-bio').html(bio);
                        $('#trainer-photo').html('<img src="' + photo + '" class="card-img-top" alt="image personal trainer gym ' + nickname + '" title="image personal trainer gym ' + nickname + '">');

                        var qualificationHtml = '';
                        for (i = 0; i < qualification.length; i++) {
                            qualificationHtml += '<li class="list-group-item">' + qualification[i] + '</li>';
                        }
                        $('#trainer-qualification').html(qualificationHtml);

                        var certificationHtml = '';
                        for (i = 0; i < certification.length; i++) {
                            certificationHtml += '<li class="list-group-item">' + certification[i] + '</li>';
                        }
                        $('#trainer-certification').html(certificationHtml);

                        var meta = {};

                        get_web_info(meta);
                    }
                }
            });
        }   

    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Trainer/views/index.blade.php ENDPATH**/ ?>