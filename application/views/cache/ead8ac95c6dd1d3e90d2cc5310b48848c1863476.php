
    <div class="col-md-12 col-form-booking d-none" style="padding:5% 0">
        <form id="form-reschedule" autocomplete="off">
        <input type="hidden" name="id_orientation" id="orientation-id">
        <input type="hidden" name="id_user" id="user-id">
        <h3 class="ff-mygym m-0 lh-1" style="font-size:36px">RESCHEDULE ORIENTATION</h3>
        <h3 class="ff-mygym m-0 lh-1" style="font-size:36px">SELECT YOUR START DATE</h3>
        <span><b>Lorem ipsum dolor sit amet</b></span>
        <div class="row mt-3 mb-3">
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text booking-form btn-date-orientation"><i class="bi-calendar3"></i></span>
                    <input name="date" type="text" class="form-control booking-form orientation" placeholder="Start Date" aria-label="Start Date" id="orientation-date" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group mb-3">
                    <span class="input-group-text booking-form btn-time-orientation"><i class="bi-clock"></i></span>
                    <select name="id_time" class="form-control booking-form" id="orientation-time" required>
                        <option selected value="" disabled style="font-style:italic">Start Time</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn center btn-md">
                <span class="btn__inner btn-md">SUBMIT</span>
            </button>
        </div>
        </form>
    </div><?php /**PATH E:\xampp\htdocs\mygym\application\modules/Ticket/views/orientation/Form_reschedule.blade.php ENDPATH**/ ?>