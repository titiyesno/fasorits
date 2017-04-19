<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>gui_modul/pivot/pivot.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>gui_modul/pivot/jquery_pivot.js"></script>

<style>
    table{
        white-space: nowrap;
    }
</style>
<section class="panel">
    <header class="panel-heading">
        Laporan Pengaduan dan Konsultasi
        <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
        </span>
    </header>
    <div class="panel-body">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
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

                    <h3 >Result</h3>
                    <span class="hide-on-print" id="pivot-detail"></span>
                    <hr/>
                    <div style="overflow-x: scroll" id="results"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    var fields = [
        {
            name: 'NAMA',
            type: 'string',
            filterable: true
        },
        {
            name: 'USERNAME',
            type: 'string',
            filterable: true
        },
        {
            name: 'EMAIL',
            type: 'string',
            filterable: true
        },
        {
            name: 'TELP',
            type: 'string',
            filterable: true
        },
    ]

    function setupPivot(input) {
        input.callbacks = {
            afterUpdateResults: function() {
                $('#results > table').dataTable({
                    "sDom": "<'row'<'span6'l><'span6'f>>t<'row'<'span6'i><'span6'p>>",
                    "iDisplayLength": 50,
                    "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "All"]],
                    "sPaginationType": "bootstrap",
                    "oLanguage": {
                        "sLengthMenu": "_MENU_ records per page"
                    }
                });
            }
        };
        $('#pivot-demo').pivot_display('setup', input);
    }
    ;

    $(document).ready(function() {
        var jso;
        var data_pos = {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/user/super/getalladmin/',
            data: data_pos,
            success: function(dataCheck) {
                jso = dataCheck;
                setupPivot({
                    json: jso,
                    fields: fields,
                    rowLabels: ["NAMA","USERNAME", "EMAIL","TELP"]
                })
                $('.stop-propagation').click(function(event) {
                    event.stopPropagation();
                });

            }
        });
    });
</script>


<script type="text/javascript" async="" src="<?php echo base_url() ?>gui_modul/pivot/c.js"></script>
<script async="" src="<?php echo base_url() ?>gui_modul/pivot/analytics.js"></script>

<script type="text/javascript" src="<?php echo base_url() ?>gui_modul/pivot/accounting.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>gui_modul/pivot/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>gui_modul/pivot/dataTables.bootstrap.js"></script>
