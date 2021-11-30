<script type="text/javascript">
    
    // $('#contact-prefix-number').keypress(function (e) {
    //     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    //         if (e.which == 187) {
    //         } else {
    //             return false;
    //         }
    //     }
    // });

    $('#contact-suffix-number').keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $("#form-contact-us").submit( function (e) {
        e.preventDefault();

        var apiAddress = "<?= $apiAddress;?>";

        var firstnameVal = $('#contact-first-name').val();
        var lastnameVal = $('#contact-last-name').val();
        var prefixnumber = $('#contact-prefix-number').val();
        var suffixnumber = $('#contact-suffix-number').val();
        var membershipVal = $('#contact-membership').val();
        var commentVal = $('#contact-comment').val();
        var emailVal = $('#contact-email').val();

        firstname = firstnameVal.replace(/(<([^>]+)>)/gi, "");
        lastname = lastnameVal.replace(/(<([^>]+)>)/gi, "");
        email = emailVal.replace(/(<([^>]+)>)/gi, "");
        membership = membershipVal.replace(/(<([^>]+)>)/gi, "");
        comment = commentVal.replace(/(<([^>]+)>)/gi, "");

        if (firstname == null || lastname == null || email == null || prefixnumber == null || suffixnumber == null || comment == null ) {
            return false;
        }

        $.ajax({
            url: apiAddress + 'contact-us',
            type: "post",
            data: {
                first_name: firstname,
                last_name: lastname,
                prefix: prefixnumber,
                suffix: suffixnumber,
                membership: membership,
                email: email,
                message: comment
            },
            dataType: "json",
            success: function (response) {

                if (response.Status == 200) {

                    $('#form-contact-us')[0].reset();

                    alert(response.Message);
                }
            }
        });
    });

</script><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Home/views/partial_detail/_js-form-contact.blade.php ENDPATH**/ ?>