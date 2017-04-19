
<!DOCTYPE html>
<html lang="en">
    <head>

        <link rel="stylesheet" type="text/css" media="screen" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" />
        <link href="<?php echo base_url() ?>gui_modul/date/css/datepicker3.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
        
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-9" role="main">

                    <div class="container">
                        <div class="row">
                            <div class='col-sm-6'>
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker5'>
                                        <input type='text' readonly="" class="form-control" />
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                var disabledDays = [
                                    <?php
                                        foreach($data as $item){
                                            echo '"',$item->date    .'",';                                            
                                        }
                                    ?>
                                ];
                                $(function () {

                                    $('#datetimepicker5').datepicker({
                                        format: 'dd/mm/yyyy',
                                        beforeShowDay: daysDisabled
                                    });
                                });
                                function daysDisabled(date) {
                                    for (var i = 0; i < disabledDays.length; i++) {
                                        if (new Date(disabledDays[i]).toString() === date.toString()) {
                                            return false;
                                        }
                                    }
                                    return true;

                                }
                            </script>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </body>
</html>