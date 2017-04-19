<script type="text/javascript" src="<?php echo base_url(); ?>gui_modul/ckeditor/ckeditor.js"></script>
<!-- Primary box -->
<section class="content-header">
    <h1>
        Olahraga
        <small>Tambah Olahraga</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> Kategori Olahraga</a></li>
        <li class="active">tambah olahraga</li>
    </ol>
</section>
<div class="content">
    <div class="col-sm-6">
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="box-title">Item Olahraga</h3>

            </div>
            <div class="box-body">
                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name">#</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" >Nama</th>

                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" >Edit</th>
                            </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        if (isset($item)) {
                            $i = 0;
                            foreach ($item as $data) {
                                if ($i % 2 == 0) {
                                    $i++;
                                    echo '<tr class="odd">';
                                } else {
                                    $i++;
                                    echo '<tr class="even">';
                                }
                                echo '<td class=" sorting_1">' . $i . '</td>
                                <td class=" "> ' . $data->start.'-'.$data->end . ' </td>
                                <td class=" "><a class="edit" href="' . base_url("index.php/services/s/ubaholahraga/" . $data->slot) . '">Edit</a></td>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <?php $this->load->view('addolahraga') ?>
</div>

