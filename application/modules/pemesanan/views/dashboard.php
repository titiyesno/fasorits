<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/pivot.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/jquery_pivot.js"></script>
<!-- pivot stuff -->
<link rel="stylesheet" href="<?php echo base_url() ?>static/pivot/bootstrap.min.css" type="text/css">
<script type="text/javascript" async="" src="<?php echo base_url() ?>static/pivot/c.js"></script>
<script async="" src="<?php echo base_url() ?>static/pivot/analytics.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/subnav.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/accounting.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/pivot/dataTables.bootstrap.js"></script>
<div class="row">
    <div class="col-md-12">
    <div class="box box-info">
    <div class="box-body">
        <div class="row form-group" >
            <div class="col-lg-12">
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Filter Fields <b class="caret"></b> </a>
                        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
                            <div id="filter-list"></div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Row Label Fields <b class="caret"></b> </a>
                        <ul class="dropdown-menu stop-propagation" style="overflow:auto;max-height:450px;padding:10px;">
                            <div id="row-label-fields"></div>
                        </ul>
                    </li>
                </ul>

                <hr/>

                <h3 class="oxigenfontblue">Hasilnya</h3>
                <span class="hide-on-print" id="pivot-detail"></span>
                <hr/>
                <div style="overflow-x: scroll" id="results"></div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>

<script type="text/javascript">
    var fields = [{
            name : 'NOMOR IDENTITAS',
            type : 'string',
            filterable : true
        }, {
            name : 'NAMA',
            type : 'string',
            filterable : true
        },{
            name : 'CODE BOOKING',
            type : 'string',
            filterable : true
        },{
            name : 'WAKTU BOOKING',
            type : 'string',
            filterable : true
        }, 
            {
            name : 'JENIS INAP',
            type : 'string',
            filterable : true
        }
//        {
//            name : 'NAMA JENIS SUBMIT',
//            type : 'string',
//            filterable : true
//        }, 
//        {
//            name : 'BULAN MASUK',
//            type : 'string',
//            filterable : true
//        }, {
//            name : 'NAMA JENIS KAMAR',
//            type : 'string',
//            filterable : true
//        }, 
    ]

    function setupPivot(input) {
        input.callbacks = {
            afterUpdateResults : function() {
                $('#results > table').dataTable({
                    "sDom" : "<'row'<'span6'l><'span6'f>>t<'row'<'span6'i><'span6'p>>",
                    "iDisplayLength" : 50,
                    "aLengthMenu" : [[25, 50, 100, -1], [25, 50, 100, "All"]],
                    "sPaginationType" : "bootstrap",
                    "oLanguage" : {
                        "sLengthMenu" : "_MENU_ records per page"
                    }
                });
            }
        };
        $('#pivot-demo').pivot_display('setup', input);
    };

    $(document).ready(function() {
        var jso;
        $.ajax({
            type : "POST",
            url : '<?php echo base_url(); ?>index.php/pemesanan/s/all',
            success : function(dataCheck) {
                jso = dataCheck;
                setupPivot({
                    json : jso,
                    fields : fields,
//                    rowLabels : ["NRP APLIKAN","PROGRAM DITERIMA","CODE BOOKING","NAMA JENIS SUBMIT"]
                    rowLabels : ["NOMOR IDENTITAS","NAMA","CODE BOOKING","WAKTU BOOKING"]
                })
                $('.stop-propagation').click(function(event) {
                    event.stopPropagation();
                });

            }
        });
    });
</script>