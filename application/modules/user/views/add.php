<div class="col-md-4">
    <!-- Default box -->
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Daftar Admin</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
             <form class="form-signin" action="index.html">
            <div class="login-wrap">
                <p>Enter your personal details below</p>
                <input type="text" class="form-control" placeholder="Full Name" autofocus>
                <input type="text" class="form-control" placeholder="Address" autofocus>
                <input type="text" class="form-control" placeholder="Email" autofocus>
                <input type="text" class="form-control" placeholder="City/Town" autofocus>
                <div class="radios">
                    <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
                        <input name="sample-radio" id="radio-01" value="1" type="radio" checked /> Male
                    </label>
                    <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
                        <input name="sample-radio" id="radio-02" value="1" type="radio" /> Female
                    </label>
                </div>

                <p>Enter your account details below</p>
                <input type="text" class="form-control" placeholder="User Name" autofocus>
                <input type="password" class="form-control" placeholder="Password">
                <input type="password" class="form-control" placeholder="Re-type Password">
                <label class="checkbox">
                    <input type="checkbox" value="agree this condition"> I agree to the Terms of Service and Privacy Policy
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Submit</button>

                <div class="registration">
                    Already Registered.
                    <a class="" href="<?php echo base_url() ?>index.php/">
                        Login
                    </a>
                </div>
            </div>
        </form>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
