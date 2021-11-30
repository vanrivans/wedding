<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

<div class="container-bar">
    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>
<div class="set-row-top-green-growers">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xs-12 row-content-contact-us" style="padding-top:15%;padding-bottom:5%;">
                <div style="padding-bottom:2%;">

                    <div class="col-md-3 col-md-offset-2" style="padding:0;">
                        <div style="background-image:url('<?= base_url('assets/images/contact/left.jpg'); ?>');height:320px;width:100%;background-repeat: no-repeat;background-position:center;background-size:cover;">

                        </div>
                    </div>

                    <div class="col-md-4 col-xs-12  col-contact-us" style="padding:2%;height:320px">
                        <form id="form-contact-us">
                        <h4 class="font-header-trending font-roboto-green-growers bolded" style="font-size:3em;margin-top:0;margin-bottom:10px">
                            CONTACT US
                        </h4>
                        <div>
                            <input type="email" id="email-contact-us" class="form-control" placeholder="Enter a valid email address" style="background: transparent;border-radius: 0px;border-right: none;border-left: none;border-top: transparent;margin-bottom:5%;border-bottom:#999 solid 2px;padding-left:0" required>
                            <input type="text" id="name-contact-us" class="form-control" placeholder="Enter your name" style="background: transparent;border-radius: 0px;border-right: none;border-left: none;border-top: transparent;margin-bottom:5%;border-bottom:#999 solid 2px;padding-left:0">
                            <input type="text" id="message-contact-us" class="form-control" placeholder="Enter your message" style="background: transparent;border-radius: 0px;border-right: none;border-left: none;border-top: transparent;margin-bottom:5%;border-bottom:#999 solid 2px;padding-left:0">
                        </div>
                        <div class="alert alert-success" role="alert" id="alert-success-contact-us" style="display:none">
                            <i class="fa fa-check"></i> Success
                        </div>

                        <div style="position:absolute;bottom:-10px">
                            <button type="submit" id="btn-submit-contact-us" class="btn btn-default button-custom-gg-contact">
                                Submit
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready( function () {
            var getUrl = window.location.href; 
            var getSiteName = "<?= $SiteName; ?>";
            var getTitle = "<?= $PageTitle; ?>";
            $("meta[property='og:url']").attr("content", getUrl);
            $("meta[property='og:title']").attr("content", getTitle);
            $("meta[property='og:site_name']").attr("content", getSiteName);
        });

        $("#form-contact-us").submit( function (e) {
            e.preventDefault();

            var nameVal = $('#name-contact-us').val();
            var emailVal = $('#email-contact-us').val();
            var messageVal = $('#message-contact-us').val();

            if (nameVal == null || emailVal == null || messageVal == null) {
                return false;
            }

            name = nameVal.replace(/(<([^>]+)>)/gi, "");
            email = emailVal.replace(/(<([^>]+)>)/gi, "");
            message = messageVal.replace(/(<([^>]+)>)/gi, "");

            $.ajax({
                url: "https://mygreengrowers.com/en/dashboard/api/contact-us",
                type: "post",
                data: {
                    name: name,
                    email: email,
                    message: message
                },
                dataType: "json",
                success: function (response) {

                    if (response.Status == 200) {

                        $('#form-contact-us')[0].reset();
                        $('#btn-submit-contact-us').hide();
                        $('#alert-success-contact-us').show();

                        setTimeout( function() {
                            $('#alert-success-contact-us').hide();
                            $('#btn-submit-contact-us').show();
                        }, 1000);
                    }
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Contact/views/index.blade.php ENDPATH**/ ?>