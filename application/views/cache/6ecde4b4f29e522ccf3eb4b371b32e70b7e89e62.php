<div style="padding-bottom:5%;text-align:left">
    
    <center class="upload-button mt-5 mb-5">
        <img class="img-circle profile-pic" src="<?php echo e(base_url('assets/images/icon/no-image.jpg')); ?>" alt="User profile picture gym" title="User profile picture gym">
    </center>

    <input name="image" class="file-upload" type="file" accept="image/*" style="display: none">

    <div class="form-group row">
        <div class="col-md-6 mb-3">
            <label for="first_name" class="mb-2 fw-650">First Name</label>
            <input type="text" name="first_name" id="first_name" class="form-control form-register" required="" placeholder="First Name">
        </div>
        <div class="col-md-6 mb-3">
            <label for="last_name" class="mb-2 fw-650">Last Name</label>
            <input type="text" name="last_name" id="last_name" class="form-control form-register" required="" placeholder="Last Name">
        </div>
    </div>

    <div class="form-group mb-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="identity_type" id="id_number_type_1" value="0" required>
            <label class="form-check-label mb-2 fw-650" for="id_number_type_1">
                National ID No
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="identity_type" id="id_number_type_2" value="1" required>
            <label class="form-check-label mb-2 fw-650" for="id_number_type_2">
                Passport No
            </label>
        </div>
        <input type="text" name="identity_number" id="identity_number" class="form-control form-register" required="" placeholder="">
    </div>

    <div class="form-group mb-3">
        <label for="birth_date" class="mb-2 fw-650">Date of Birth</label>
        <div class="input-group">
            <input type="text" name="birth_date" id="birth_date" class="form-control form-register singledate" required="" placeholder="YYY-MM-DD">
            <span class="input-group-text right" style="padding:0 25px">
                <i class="bi-calendar3" style="font-size:26px;color:#000" id="btn-date"></i>
            </span>
        </div>
    </div>

    <div class="form-group mb-3">
        <label for="gender" class="mb-2 fw-650">Gender</label>
        <select name="gender" id="gender" class="form-control form-register" required="">
            <option value="" selected disabled>Select your Gender</option>
            <option value="1">Male</option>
            <option value="2">Female</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label for="address" class="mb-2 fw-650">Address</label>
        <textarea class="form-control form-register" rows="4" name="address" id="address" placeholder="Address"></textarea>
    </div>

    <div class="form-group row">
        <div class="col-md-12 col-xs-12">
            <label for="" class="mb-2 fw-650">Phone Number</label>
        </div>
        <div class="col-md-3 col-xs-3 mb-3">
            <input type="text" name="prefix" id="prefix" class="form-control form-register bolded text-center" style="font-size:12pt;" required="" value="+81" maxlength="3">
        </div>
        <div class="col-md-9 col-xs-9">
            <input type="text" name="suffix" id="suffix" class="form-control form-register" required="" placeholder="123456">
        </div>
    </div>
    
    <div class="form-group mb-3">
        <label for="email" class="mb-2 fw-650">Email</label>
        <input type="email" name="email" id="email" class="form-control form-register" required="" placeholder="Email">
    </div>

    <div class="form-group mb-3">
        <label for="password" class="mb-2 fw-650">Password</label>
        <div class="input-group">
            <input type="password" name="password" id="password" class="form-control form-register" required="" placeholder="Password">
            <span class="input-group-text right" style="padding:0 25px">
                <i class="bi-eye" id="icon-password" style="font-size:26px;color:#000" onclick="showPassword()"></i>
            </span>
        </div>
    </div>

    <?php echo $__env->make('Register.views.partial_detail.Form_orientation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
</div>
<?php /**PATH E:\xampp\htdocs\mygym\application\modules/Register/views/partial_detail/Form.blade.php ENDPATH**/ ?>