
<?php
$attributes = array('class' => 'form-signin');
echo form_open("user/user/submitregister", $attributes)
?>
<h2 class="form-signin-heading">registration now</h2>
<div class="login-wrap">
    <p>Enter your personal details below</p>
    <input type="text" class="form-control" placeholder="Full Name" name="nama" autofocus required="">
    <input type="text" class="form-control" placeholder="Address" name="alamat" autofocus required="">
    <input type="text" class="form-control" placeholder="Email" name="email" autofocus required="">
    <input type="text" class="form-control" placeholder="Telp" name="telp" autofocus required="">
    <div class="radios">
        <label class="label_radio col-lg-6 col-sm-6" for="radio-01">
            <input name="gender" id="radio-01" value="1" type="radio" checked /> Male
        </label>
        <label class="label_radio col-lg-6 col-sm-6" for="radio-02">
            <input name="gender" id="radio-02" value="1" type="radio" /> Female
        </label>
    </div>

    <p> Enter your account details below</p>
    <input type="text" name="username" class="form-control" placeholder="User Name" autofocus required="">
    <input type="password"  id="password" name="password" class="form-control" placeholder="Password" required="">
    <input type="password" id="_password" name="_password" class="form-control" placeholder="Re-type Password" onkeyup="checkPass();
                            return false;" required="">
    <span id="confirmMessage" class="confirmMessage"></span>
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


<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script>
    function checkPass()
    {
        //Store the password field objects into variables ...
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('_password');
        //Store the Confimation Message Object ...
        var message = document.getElementById('confirmMessage');
        //Set the colors we will be using ...
        var goodColor = "#66cc66";
        var badColor = "#ff6666";
        //Compare the values in the password field 
        //and the confirmation field
        if (pass1.value == pass2.value) {
            //The passwords match. 
            //Set the color to the good color and inform
            //the user that they have entered the correct password 
            pass2.style.backgroundColor = goodColor;
            message.style.color = goodColor;
            message.innerHTML = "Passwords Match!"
        } else {
            //The passwords do not match.
            //Set the color to the bad color and
            //notify the user.
            pass2.style.backgroundColor = badColor;
            message.style.color = badColor;
            message.innerHTML = "Passwords Do Not Match!"
        }
    }
</script>
