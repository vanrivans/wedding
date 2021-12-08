<?php $__env->startSection('main'); ?>

    <div class="row">

		<div class="col col-md-6 col-lg-6">

			<table id="table-recipient" class="table table-bordered table-stripped" style="width:100%">
				<thead>
					<tr>
						<th>Recipient</th>
						<th>Nomor</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>

			<center>
				<button class="btn d-none" id="pagination" data-id="1">
					<span class="btn__inner">Load more</span>
				</button>
			</center>
		</div>

	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

	<script>
		var ckey = "<?= $ckey; ?>";
		var apiAddress = "<?= $apiAddress; ?>";

		$(document).ready( function() {
			// get_recipient();

			var tableR = $('#table-recipient').DataTable({

				// Data
				ajax: {
					url: apiAddress + 'recipient/' + ckey,
					type: "POST"
				},
				processing: true,
				serverSide: true,

				// Ordering
				order: [0, 'asc'],
				pageLength: 20,
				lengthMenu: [ 20, 40, 60, 80, 100 ]
			
			});
		});

		// function get_recipient() {

		// 	$.ajax({
		// 		url: apiAddress + 'recipient/' + ckey,
		// 		dataType: 'json',
		// 		success: function (response) {

		// 			if (response.Status == 200) {

		// 				var data = response.data;

		// 				if (data.length > 0) {

		// 					var html = '';

		// 					for (i = 0; i < data.length; i++) {

		// 						html += append_row(data[i]);
		// 					}

		// 					$('#table-recipient tbody').html(html);
		// 				}

		// 			}
		// 		}
		// 	});
		// }

		// function append_row(data) {

		// 	var html = '';

		// 	var rkey = data['r_key'];
		// 	var ukey = data['u_key'];
		// 	var name = data['r_name'];
		// 	var nomor = data['r_phone'];
		// 	var status = 'null';
		// 	var onclick = 'send_card(this)';
		// 	var button = '<button class="btn btn-send"><span class="btn__inner" id="btn-' + rkey + '">SEND</span></button>';

		// 	if (data['status'] == 1) {
		// 		status = '<span class="text-success" id="status-' + rkey + '">SENT</span>';
		// 		button = '<button class="btn btn-send"><span class="btn__inner" id="btn-' + rkey + '">RESEND</span></button>';
		// 	}

		// 	html += '<tr>';
		// 		html += '<td>' + name + '</td>';
		// 		html += '<td>' + nomor + '</td>';
		// 		html += '<td>' + status + '</td>';
		// 		html += '<td>' + button + '</td>';
		// 	html += '</tr>';

		// 	return html;
		// }

		$(document).on('click', '.btn-send', function (e) {
			e.preventDefault();
			
			var ukey = $(this).data('ckey');
			var rkey = $(this).data('rkey');

			$.ajax({
				url: apiAddress + 'send_card',
				type: 'post',
				data: {
					ukey: ukey,
					rkey: rkey
				},
				success: function (response) {

					if (response.Status == 200) {

						window.open(response.data.chat, '_blank');
					
					}
				}
			});
		});
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wedding\application\modules/Dashboard/views/index.blade.php ENDPATH**/ ?>