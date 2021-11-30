
<div class="modal" tabindex="-1" role="dialog" id="modal-login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body"> 
                <div class="row">
                    <div class="col-lg-12 col-xs-12">

                        <div class="col-md-6 col-md-offset-3" style="padding:2%;">
                            <center>
                                <img src="<?= base_url('assets/images/logo/logo.png'); ?>" style="width:200px;">
                            </center>

                            <form id="form-modal-login">
                                <input type="hidden" id="from">
                                <div>
                                    <input type="email" id="modal-login-email" class="form-control form-style-login-gg" required="" placeholder="Email">
                                    <input type="password" id="modal-login-password" class="form-control form-style-login-gg" required="" placeholder="Password">
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-default button-login-gg">Login</button>
                                </div>
                            </form>

                            <div class="text-center">
                                <p style="padding: 5% 2% 2% 2%;font-size: 1.3em;">
                                    If you don’t have an account,<br>
                                    please
                                    <span>
                                        <a href="<?= base_url('register'); ?>" style="text-decoration:none;color:#CE5B2B;">register</a>
                                    </span> here
                                </p>
                            </div>
                            
                            <div class="text-center">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\mygym\application\modules/Layouts/config/_modal-login.blade.php ENDPATH**/ ?>