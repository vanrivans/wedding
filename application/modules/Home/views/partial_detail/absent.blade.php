	
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

	
