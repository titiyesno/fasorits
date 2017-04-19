<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        Lapangan
        <small>Tambah Lapangan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> Lapangan Olahraga</a></li>
        <li class="active">tambah lapangan</li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Lapangan Member</h3>

        </div>
        <div class="panel-body">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                        <?php
                        echo form_open('services/s/adlapangan');
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Lapangan</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Olahraga</label>
                            <select class="selectpicker" name="olahraga">
                                <?php 
                                $sql = "select * from olahraga";
                                $result = $this->db->query($sql)->result();
                                foreach ($result as $olahraga){
                                    echo '<option value="'.$olahraga->id.'">'.$olahraga->nama.'</option>';
                                }?>
                            </select>
                        </div>
                        <div class="form-group">

                            <input type="submit" class="btn btn-success" value="Submit"/>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>

<script type="text/javascript">
    var fields = [
        {
            name: 'NAMA LAPANGAN',
            type: 'string',
            filterable: true
        },
        {
            name: 'OLAHRAGA',
            type: 'string',
            filterable: true
        },
        {
            name: 'ACTION',
            type: 'string',
            filterable: true
        },
    ]

    function setupPivot(input) {
        input.callbacks = {
            afterUpdateResults: function () {
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

    $(document).ready(function () {
        var jso;
        var data_pos = {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: '<?php echo base_url() ?>index.php/services/s/getolahraga/',
            data: data_pos,
            success: function (dataCheck) {
                jso = dataCheck;
                setupPivot({
                    json: jso,
                    fields: fields,
                    rowLabels: ["NAMA LAPANGAN", "OLAHRAGA", "ACTION"]
                })
                $('.stop-propagation').click(function (event) {
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
