<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Login Form - fasor ITS</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>gui_modul/CustomLoginFormStyling/css/style.css" />
        
        
        <script src="<?php echo base_url() ?>gui_modul/CustomLoginFormStyling/js/modernizr.custom.63321.js"></script>
        <!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
        <style>
            body {
                background: #e7e7e7;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <header>


            </header>

            <section class="main">

                <?php
                
                $attributes = array('class' => 'form-2');
                
                echo form_open("user/u/signin", $attributes)
                ?>
                <a href="<?php echo base_url() ?>index.php">
                    <img src="<?php echo base_url() ?>content/img/its.png" height="100"/>
                </a>
                <h1 class="oxigenfont">Login <strong>fasor ITS</strong> System</h1>

                <p class="float">
                    <label for="login"><i class="icon-user"></i>Username</label>
                    <input type="text" name="username" placeholder="NRP">
                </p>
                <p class="float">
                    <label for="password"><i class="icon-lock"></i>Password</label>
                    <input type="password" name="password" placeholder="Password" class="showpassword">
                </p>
                <p class="bg-danger"><?php if(isset($eror)) echo $eror?></p>
                <p class="clearfix"> 
                    <a href="<?php echo base_url() ?>index.php/user/user/registrasi" class="log-twitter">Sign Up</a>    
                    <input type="submit" name="submit" value="Log in">
                </p>
                </form>
            </section>

        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $(".showpassword").each(function(index, input) {
                    var $input = $(input);
                    $("<p class='opt'/>").append(
                            $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
                        var change = $(this).is(":checked") ? "text" : "password";
                        var rep = $("<input placeholder='Password' type='" + change + "' />")
                                .attr("id", $input.attr("id"))
                                .attr("name", $input.attr("name"))
                                .attr('class', $input.attr('class'))
                                .val($input.val())
                                .insertBefore($input);
                        $input.remove();
                        $input = rep;
                    })
                            ).append($("<label for='showPassword'/>").text("Show password")).insertAfter($input.parent());
                });

                $('#showPassword').click(function() {
                    if ($("#showPassword").is(":checked")) {
                        $('.icon-lock').addClass('icon-unlock');
                        $('.icon-unlock').removeClass('icon-lock');
                    } else {
                        $('.icon-unlock').addClass('icon-lock');
                        $('.icon-lock').removeClass('icon-unlock');
                    }
                });
            });
        </script>
    </body>
</html>
