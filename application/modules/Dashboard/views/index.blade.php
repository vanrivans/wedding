{{-- Get layout --}}
@extends('Layouts.layout')

@section('main')

    <div class="row">

		<div class="col col-md-6 col-lg-6">

			<table id="table-recipient" class="table table-bordered table-stripped">
				<thead>
					<tr>
						<th>Recipient</th>
						<th>Nomor</th>
						<th>Status</th>
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

@endsection

@section('script')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

	<script>
		var ckey = "<?= $ckey; ?>";
		var apiAddress = "<?= $apiAddress; ?>";

		$(document).ready( function() {
			get_recipient();

			$('#table-recipient').datatables();
		});

		function get_recipient() {

			$.ajax({
				url: apiAddress + 'recipient/' + ckey,
				dataType: 'json',
				success: function (response) {

					if (response.Status == 200) {

						var data = response.data;

						if (data.length > 0) {

							var html = '';

							for (i = 0; i < data.length; i++) {

								html += append_row(data[i]);
							}

							$('#table-recipient tbody').append(html);
						}

					}
				}
			});
		}

		function append_row(data) {

			var html = '';

			var rkey = data['r_key'];
			var ukey = data['u_key'];
			var name = data['name'];
			var nomor = data['nomor'];
			var status = 'null';
			var onclick = 'send_card("' + ukey + '", "' + rkey + '")';
			var button = '<button class="btn" onclick="' + onclick + '"><span class="btn__inner" id="btn-' + rkey + '">SEND</span></button>';

			if (data['status'] == 1) {
				status = '<span class="text-success" id="status-' + rkey + '">SENT</span>';
				button = '<button class="btn" onclick="' + onclick + '"><span class="btn__inner" id="btn-' + rkey + '">RESEND</span></button>';
			}

			html += '<tr>';
				html += '<td>' + name + '</td>';
				html += '<td>' + nomor + '</td>';
				html += '<td>' + status + '</td>';
				html += '<td>' + button + '</td>';
			html += '</tr>';

			return html;
		}

		function send_card(ukey, rkey) {

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
						
						$('#status-' + rkey).html('SENT');
						$('#btn-' + key).html('RESEND');
					}
				}
			});
		}
	</script>

@endsection
