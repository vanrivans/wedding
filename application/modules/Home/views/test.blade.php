@include('Layouts.config._css-link')

<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nama</th>
        <th>Status</th>
        <th>Kirim</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Ree</td>
        <td>Belum Dikirim</td>
		<td>
			<a href="{{ $chat }}" target="_blank" class="btn btn-block" style="background-color: rgb(0, 114, 17);"><i class="bi-whatsapp"></i> SEND</a>
		</td>
    </tr>
    <tr>
        <td>Van</td>
        <td>Belum Dikirim</td>
        <td><a href="" class="btn disabled">Send</a></td>
    </tr>
    </tbody>
</table>


