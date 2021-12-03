
    <div class="row absent__row">
        <div class="col">
            <img src="{{ base_url('assets/template/mark-l.png') }}" class="absent__mark mark-l">
            <div class="absent__title">
                Konfirmasi Kehadiran
            </div>
            <img src="{{ base_url('assets/template/mark-r.png') }}" class="absent__mark mark-r">
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
                    <button type="submit" class="btn" id="btn-absent-submit">
                        <span class="btn__inner">Konfirmasi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
