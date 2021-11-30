
<div class="container-fluid" style="padding-bottom:3rem">
    <div class="col-md-12 text-center" style="padding-bottom:3rem">
        <h3 class="ff-mygym m-0" style="font-size:36px">GYM ACCESS</h3>
        <span><b>Sunday - Monday | 09:00 AM - 10:00 PM</b></span>
        <center>
            <div id="package"></div>
            <input type="hidden" id="package-id">
            <input type="hidden" id="package-price">
            <input type="hidden" id="package-name">
            <input type="hidden" id="package-expired">
            <input type="hidden" id="package-duration">
            <input type="hidden" id="package-duration-real">
        </center>
    </div>
    <?php if($access != 0): ?>
    <div class="col-md-12 col-form-booking">
        <h3 class="ff-mygym m-0 lh-1" style="font-size:36px">SELECT YOUR START DATE</h3>
        <span><b>Lorem ipsum dolor sit amet</b></span>
        <div class="row mt-3 mb-3">
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <span class="input-group-text booking-form btn-date-package"><i class="bi-calendar3"></i></span>
                    <input type="text" class="form-control booking-form singledate package" placeholder="Start Date" aria-label="Start Date" required id="package-date">
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript">

    function get_package() {

        var apiAddress = "<?= $apiAddress;?>";

        $.ajax({
            url: apiAddress + 'package',
            type: "get",
            dataType: "json",
            success: function (response) { 

                if (response.Status == 200) {

                    var html = '';

                    for (i = 0; i < response.data.length; i++) {    

                        var id = response.data[i]['id_booking_package'];
                        var name = response.data[i]['name'];    
                        var price = response.data[i]['price'];
                        var discount = response.data[i]['discount'];
                        var duration = response.data[i]['duration'];
                        var duration_real = response.data[i]['duration_real'];
                        var description = response.data[i]['description'];
                        var image = response.data[i]['image'];
                        var expired = response.data[i]['expired'];
                        var priceVal = price;

                        if (discount != '-') {
                            priceVal = discount;
                        }

                        html += '<div class="card card-booking-2 card-package mt-3" style="background:url(' + image + ');background-position:center" id="card-package-' + id + '" data-id="' + id + '" data-value="' + priceVal + '" data-package="' + name + '" data-duration="' + duration + '" data-expired="' + expired + '" data-durreal="' + duration_real + '">';
                            html += '<div class="card-body">';
                                html += '<i class="bi-circle-fill booking-check" id="check-' + id + '"></i>';
                                html += '<h5 class="card-title" style="right:28%">' + name + '</h5>';

                                html += '<div class="price-tag">';
                                if (discount == '-') {
                                    html += '<span class="ff-mygym lh-1 card-subtitle">¥ ' + number_format(price, false) + '</span><br>';
                                } else {
                                    html += '<span class="ff-mygym lh-1 card-subtitle discount">¥ ' + number_format(price, false) + '</span><br>';
                                    html += '<span class="ff-mygym lh-1 card-subtitle">¥ ' + number_format(discount, false) + '</span><br>';
                                }
                                
                                html += '<span style="font-size:26px">' + duration + '</span><br>';
                                html += '<span style="font-size:26px">exp: ' + expired + ' days</span>';
                                html += '</div>';

                            
                            html += '</div>';
                        html += '</div>';
                    }

                    $('#package').html(html);
                    
                    selected_package();
                }
            }
        });
    }
    
    function selected_package() {
        
        $('.card-booking-2').click( function () {

            var id = $(this).data('id');
            var price = $(this).data('value');
            var package = $(this).data('package');
            var duration = $(this).data('duration');
            var duration_real = $(this).data('durreal');
            var expired = $(this).data('expired');
            var selector = '#check-' + id;

            if (id != 'x') {
                $('.card-package .booking-check').removeClass('bi-check-circle-fill').removeClass('active').addClass('bi-circle-fill');
                $('#total-payment').html('JYP ' + number_format(price, false));
            }

            $('.card-package').removeClass('active');

            if ($(selector).hasClass('active')) {
                $(selector).removeClass('bi-check-circle-fill').removeClass('active').addClass('bi-circle-fill');
            } else {
                $(selector).removeClass('bi-circle-fill').addClass('bi-check-circle-fill').addClass('active');
                $('#card-package-' + id).addClass('active');

                if (id != 'x') {
                    $('#package-id').val(id);
                    $('#package-price').val(price);
                    $('#package-name').val(package);
                    $('#package-duration').val(duration);
                    $('#package-duration-real').val(duration_real);
                    $('#package-expired').val(expired);
                }
            }
        });
    }


</script><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/partial_detail/gym-access.blade.php ENDPATH**/ ?>