
    <div class="row absent__row">
        <div class="col">
            {{-- <img src="{{ base_url('assets/templates/mark-l.png') }}" class="absent__mark mark-l"> --}}
            <div class="absent__title">
                Konfirmasi Kehadiran
            </div>
            {{-- <img src="{{ base_url('assets/templates/mark-r.png') }}" class="absent__mark mark-r"> --}}
        </div>
    </div>

    <div class="row">
        <div class="col absent__col">
            <form id="form-absent">
                <input type="hidden" name="input_absent" id="input_absent" value="0">
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-absent btn-absent-y" data-id="y" id="btn-absent-y">
                        <span class="btn__inner">Saya akan hadir</span>
                    </button>
                    <button type="button" class="btn btn-absent btn-absent-n" data-id="n" id="btn-absent-n">
                        <span class="btn__inner">Saya tidak dapat hadir</span>
                    </button>
					<div class="row absent__val__row d-none">
						<div class="col-3 pr-0">
							<button type="button" class="btn w-100" id="btn-absent-minus" onclick="calcAbsentVal('-')">
								<span class="btn__inner">-</span>
							</button>
						</div>
						<div class="col-6 col-absent-text">
							<span class="absent__text" id="absent__text">0</span>
							<input type="hidden" name="input_absent_val" id="input_absent_val" value="0">
						</div>
						<div class="col-3 pl-0">
							<button type="button" class="btn w-100" id="btn-absent-plus" onclick="calcAbsentVal('+')">
								<span class="btn__inner">+</span>
							</button>
						</div>
					</div>
                    <button type="submit" class="btn" id="btn-absent-submit">
                        <span class="btn__inner">Konfirmasi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

	
{{-- Define script --}}
@section('script')

<script type="text/javascript">

	$(".btn-absent").click( function () {

		var param = $(this).data('id');

		$(".btn-absent").removeClass('active');
		$("#btn-absent-" + param).addClass('active');

		if (param == 'y') {
			$("#input_absent").val(1);

			showAbsentVal();
		} else {
			$("#input_absent").val(0);

			hideAbsentVal();
		}
	});

	$("#form-absent").submit( function () {

		if (! $(".btn-absent").hasClass('active')) {
			return false;
		}

		console.log(true);
	});

	function showAbsentVal() {

		$(".absent__val__row").removeClass("d-none").addClass("d-flex");
		resetAbsentVal();
	}

	function hideAbsentVal() {

		$(".absent__val__row").removeClass("d-flex").addClass("d-none");
		resetAbsentVal();
	}

	function resetAbsentVal() {
		$("#btn-absent-minus").addClass("disabled");

		$("#absent__text").html(1);
		$("#input_absent_val").val(1);
	}

	function calcAbsentVal(param) {

		var value = $("#input_absent_val").val();

		if (param == '+') {
			value = +value + 1;
		} else {
			value = +value - 1;
		}

		if (value > 1) {
			$("#btn-absent-minus").removeClass('disabled');
		} else {
			$("#btn-absent-minus").addClass('disabled');
		}

		$("#absent__text").html(value);
		$("#input_absent_val").val(value);
	}


</script>

@endsection
