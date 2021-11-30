<?php
$CI = &get_instance();
?>
<!DOCTYPE html>
<html lang="ja">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- URL Theme Color untuk Chrome, Firefox OS, Opera dan Vivaldi -->
    <meta name="theme-color" content="#006352" />

    <!-- URL Theme Color untuk Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#006352" />

    <!-- URL Theme Color untuk iOS Safari -->
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="author" content="mygym">
    <meta property="og:url" content="" />
    <meta property="og:title" content="<?= empty($PageTitle) ? '' : $PageTitle; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= empty($SiteName) ? '' : $SiteName; ?>" />
    <meta name="geo.placename" content="" />
    <meta name="Keywords" content="<?= empty($MetaKeywords) ? '' : $MetaKeywords; ?>">
    <meta name="description" content="<?= empty($MetaDescription) ? '' : $MetaDescription; ?>">

    <title><?= empty($PageTitle) ? '' : $PageTitle; ?></title>

    <link rel="shortcut icon" href="<?=base_url('assets/images/logo/logo.png'); ?>" />
    <link href="<?=base_url('assets/images/logo/logo.png'); ?>" rel='icon' type='image/x-icon'/>

    
    <link href="<?php echo e(base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('vendor/twbs/bootstrap-icons/bootstrap-icons.css')); ?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/fonts.css')); ?>" rel="stylesheet">

    <link href="<?php echo e(base_url('assets/css/scanner.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(base_url('assets/css/ticket.css')); ?>" rel="stylesheet">

</head>
<body style="overflow-x:hidden">

    
    <div class="container-fluid p-0">

        <div class="row">

            <div class="col-md-12 p-0">

                <div class="container-fluid p-0">
                    <section class="first-view" id="firstView">
                        <div class="container">
                            <form id="form-qrcode">
                                <label class="form-label ff-mygym">NO. BARCODE</label>
                                <input type="text" class="form-control" id="input-qrcode" autofocus>
                            </form>
                        </div>
                    </section>
                </div>

            </div>

        </div>

    </div>

    <!-- Modal Orientation -->
    <div class="modal modal-md" id="modalOrien" tabindex="-1" aria-labelledby="modalOrien" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-ticket">
                <div class="modal-body">
                    <div class="card ticket-list orientation-list p-2 mb-3">
                        <div class="card-header text-center">
                            <span class="ff-mygym fs-2">ORIENTATION TICKET</span>
                        </div>
                        <div class="card-body text-center">
                            <div class="fs-5">Name</div>
                            <div class="fs-3 bolded name-val">Lorem Ipsum</div>
                            <div class="fs-5">Orientation Time</div>
                            <div class="fs-3 bolded ort-time">02:00 PM - 02:30 PM</div>
                            <div class="fs-5">Scan In</div>
                            <div class="fs-3 bolded scan-in">01:50 PM</div>
                            <div class="fs-5">Scan Out</div>
                            <div class="fs-3 bolded scan-out">02:30 hours</div>
                            <div class="fs-5">Duration</div>
                            <div class="fs-3 bolded dur">32 Minutes</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Package -->
    <div class="modal" id="modalPackage" tabindex="-1" aria-labelledby="modalPackage" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-ticket">
                <div class="modal-body">
                    <div class="card ticket-list orientation-list p-2 mb-3">
                        <div class="card-header text-center">
                            <span class="ff-mygym fs-2">PACKAGE A</span>
                        </div>
                        <div class="card-body text-center">
                            <div class="fs-5">Expired Date</div>
                            <div class="fs-3 bolded">2 Desember 2021</div>
                            <div class="fs-5">Time Remaining</div>
                            <div class="fs-3 bolded">3 hours</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo e(base_url('vendor/components/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <script type="text/javascript">

        $(document).ready( function () {

            $('#modalOrien').modal('show');

			var input = document.getElementById("input-qrcode");

            // input.addEventListener("keyup", function(event) {

            //     var time = "<?php echo date('Y-m-d H:i:s');?>";

            //     if (event.keyCode === 13) {

            //         event.preventDefault();

            //         $.ajax({
            //             url: "<?= site_url('scanner/scanning'); ?>",
            //             type: "post",
			//             data: {
            //                 qrcode: input.value,
            //                 time: time
            //             }, 
            //             dataType: "json",
            //             success: function (response) {

            //                 if (response.Status == 200) {

            //                     var data = response.data;

            //                     // Orientation
            //                     if (data['ticket_id'] == 1) {

            //                     }
            //                 }

            //             }
            //         });
            //     }
            // });
        });
    </script>
    
</body>
</html><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Scanner/views/index.blade.php ENDPATH**/ ?>