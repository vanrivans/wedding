<!-- for html view -->


<?php $__env->startSection('navbar-div'); ?>

    <?php echo $__env->make('Layouts.config._navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-div-page'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<section class="booking" style="padding-top:12.5%">
    <div class="container pb-5" style="max-width:1034px">

        <div class="col-md-12 mb-5">

            <a href="<?= base_url('booking/reset/1'); ?>" class="clr-orange bolded">
                <i class="bi-arrow-left"></i> Back to package
            </a>
        </div>

        <?php echo $__env->make('Booking.views.partial_detail.timeline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="col-md-8 offset-md-2" style="padding:2%;">

            <h1 class="text-center ff-mygym mb-5">PAYMENTS</h1>

			<!-- Display a payment form -->
			<form id="payment-form">
				<div id="payment-element">
					<!--Stripe.js injects the Payment Element-->
				</div>
				<center>
				<button class="btn mt-3" id="submit">
					<div class="spinner hidden" id="spinner"></div>
					<span class="btn__inner" id="button-text">Pay now</span>
				</button>
				</center>
				<div id="payment-message" class="hidden"></div>
			</form>

        </div>

    </div>
    
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('Layouts.config._get_data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<script src="https://js.stripe.com/v3/"></script>

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
        
        $('#booking-2').attr("src", "<?=base_url('assets/images/icon/icon-booking-step-2-active.webp');?>");
        $('#booking-3').attr("src", "<?=base_url('assets/images/icon/icon-booking-step-3-active.webp');?>");
        $('#booking-4').attr("src", "<?=base_url('assets/images/icon/icon-booking-step-4-active.webp');?>");

		summary();
    });

    function summary() {

		var orientation = "<?=$orientation;?>";
		var package_price = "<?=$package_price;?>";
		var package_name = "<?=$package_name;?>";
		var package_date_format = "<?=$package_date_format;?>";
		var package_duration = "<?= $package_duration; ?>";
		var package_expired = "<?= $package_expired; ?>";

		if (orientation == 0) {
			$('#summary-orientation').css('display', 'none');
		}

		$('#summary-package').html(package_name);
		$('#summary-package-info').html(package_duration + ' | Exp: ' + package_expired);
		$('#summary-total-payment').html(number_format(package_price, false));  
		$('#summary-package-price').html(number_format(package_price, false));
		$('#summary-package-date').html(package_date_format)

		$('#total-payment').html(number_format(package_price, false));
	}

    $('.btn-booking-continue').click( function () {

		location.href = "<?= base_url('Booking/payment'); ?>";

        // var apiAddress = "<?= $apiAddress; ?>";

        // var user_id = "<?= $id_sess; ?>";
        // var package_id = "<?= $package_id; ?>";
        // var duration = "<?= $package_duration_real; ?>";
        // var expired = "<?= $package_expired; ?>";
        // var package_date = "<?= $package_date; ?>";

        // $.ajax({
        //     url: apiAddress + 'booking-create',
        //     type: "post",
        //     data: {
        //         id_user: user_id,
        //         id_booking_package: package_id,
        //         duration: duration,
        //         expired: expired,
        //         start_date: package_date
        //     },
        //     success: function (response) {

        //         if (response.Status == 200) {
        //             alert(response.Message);
        //             send_email(response.data['qrcode'], 'booking/reset');
        //         }
        //     }
        // })
    });
</script>

<script>
	// A reference to Stripe.js initialized with a fake API key.
	const stripe = Stripe("pk_test_TYooMQauvdEDq54NiTphI7jx");

	// The items the customer wants to buy
	const items = [{
		id: "xl-tshirt"
	}];

	let elements;

	initialize();
	checkStatus();

	document
		.querySelector("#payment-form")
		.addEventListener("submit", handleSubmit);

	// Fetches a payment intent and captures the client secret
	async function initialize() {
		const {
			clientSecret
		} = await fetch("<?= base_url('booking/submit_payments'); ?>", {
			method: "POST",
			headers: {
				"Content-Type": "application/json"
			},
			body: JSON.stringify({
				items
			}),
		}).then((r) => r.json());

		elements = stripe.elements({
			clientSecret
		});

		const paymentElement = elements.create("payment");
		paymentElement.mount("#payment-element");
	}

	async function handleSubmit(e) {
		e.preventDefault();
		setLoading(true);

		const {
			error
		} = await stripe.confirmPayment({
			elements,
			confirmParams: {
				// Make sure to change this to your payment completion page
				return_url: "<?= base_url('booking/complete'); ?>",
			},
		});

		// This point will only be reached if there is an immediate error when
		// confirming the payment. Otherwise, your customer will be redirected to
		// your `return_url`. For some payment methods like iDEAL, your customer will
		// be redirected to an intermediate site first to authorize the payment, then
		// redirected to the `return_url`.
		if (error.type === "card_error" || error.type === "validation_error") {
			showMessage(error.message);
		} else {
			showMessage("An unexpected error occured.");
		}

		setLoading(false);
	}

	// Fetches the payment intent status after payment submission
	async function checkStatus() {
		const clientSecret = new URLSearchParams(window.location.search).get(
			"payment_intent_client_secret"
		);

		if (!clientSecret) {
			return;
		}

		const {
			paymentIntent
		} = await stripe.retrievePaymentIntent(clientSecret);

		switch (paymentIntent.status) {
			case "succeeded":
				showMessage("Payment succeeded!");
				break;
			case "processing":
				showMessage("Your payment is processing.");
				break;
			case "requires_payment_method":
				showMessage("Your payment was not successful, please try again.");
				break;
			default:
				showMessage("Something went wrong.");
				break;
		}
	}

	// ------- UI helpers -------

	function showMessage(messageText) {
		const messageContainer = document.querySelector("#payment-message");

		messageContainer.classList.remove("hidden");
		messageContainer.textContent = messageText;

		setTimeout(function() {
			messageContainer.classList.add("hidden");
			messageText.textContent = "";
		}, 4000);
	}

	// Show a spinner on payment submission
	function setLoading(isLoading) {
		if (isLoading) {
			// Disable the button and show a spinner
			document.querySelector("#submit").disabled = true;
			document.querySelector("#spinner").classList.remove("hidden");
			document.querySelector("#button-text").classList.add("hidden");
		} else {
			document.querySelector("#submit").disabled = false;
			document.querySelector("#spinner").classList.add("hidden");
			document.querySelector("#button-text").classList.remove("hidden");
		}
	}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Booking/views/payments.blade.php ENDPATH**/ ?>