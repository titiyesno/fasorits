<div class="col-sm-4">
    <section class="panel">
        <header class="panel-heading">
            Add New Category Photos
        </header>
        <div class="panel-body">
            <?php
            echo form_open('galeri/s/ubah');
            ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori Lama</label>
                <input type="text" name="nama2" value="<?php echo $nama[0]->nama?>" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori"/>
            </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori Baru</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori"/>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $nama[0]->idgaleri?>" />
                <input type="submit" class="btn btn-success" value="Submit"/>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="panel-body">
            <div class="adv-table editable-table ">
               
                <div class="space15"></div>
                <hr/>
                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample" aria-describedby="editable-sample_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="First Name">#</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending" >Nama Kategori</th>

                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Edit: activate to sort column ascending" >Edit</th>
                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="editable-sample" rowspan="1" colspan="1" aria-label="Delete: activate to sort column ascending" >Delete</th></tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php
                        if (isset($galeri)) {
                            $i = 0;
                            foreach ($galeri as $data) {
                                if ($i % 2 == 0) {
                                    $i++;
                                    echo '<tr class="odd">';
                                } else {
                                    $i++;
                                    echo '<tr class="even">';
                                }
                                echo '<td class=" sorting_1">' . $i . '</td>
                                <td class=" "> ' . $data->nama . ' </td>
                                <td class=" "><a class="edit" href="' . base_url("index.php/galeri/super/ubah_kategori/" . $data->idgaleri) . '">Edit</a></td>
                                <td class=" "><a class="delete" href="' . base_url("index.php/galeri/super/hapus_kategori/" . $data->idgaleri) . '">Delete</a></td></tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>