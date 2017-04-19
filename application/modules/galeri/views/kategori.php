<section class="content-header">
    <h1>
        Gallery
        <small>Picture</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/s") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Gallery</li>
    </ol>
</section>
<div class="content">
    <div class="col-sm-6">

        <section class="box">
            <div class="box-header">
                <center><h3 class="box-title">Add Gallery to Define Category</h3></center>
            </div>
            <div class="box-body">
                <?php
                echo form_open('galeri/s/kategori_add');
                ?>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori </label>
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Tambahkan"/>
                </div>
                <?php echo form_close(); ?>
            </div>
            <div class="box-body">
                <div class="adv-table editable-table ">
                    <table class="table table-condensed">
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Galeri</th>
                                <th>Edit</th>
                                <th style="">Delete</th>
                                <th style="">Lihat</th>
                            </tr>
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
                                <td class=" "> ' . $data->nama . ' </a></td>
                                <td class=" "><a class="edit" href="' . base_url("index.php/galeri/s/ubah_kategori/" . $data->idgaleri) . '">Edit</a></td>
                                <td class=" "><a class="delete" href="' . base_url("index.php/galeri/s/hapus_kategori/" . $data->idgaleri) . '">Delete</a></td>';
                                    echo '<td><a class="edit" href="' . base_url("index.php/galeri/s/index/" . $data->idgaleri) . '">Lihat Galeri</a></td></tr>';
                                }
                            }
                            ?>
                        </tbody></table>
                </div>
            </div>
        </section>
    </div>
    <div class="col-sm-6">
        <section class="box">
            <div class="box-header">
                <center><h3 class="box-title">Gallery</h3></center>
            </div>
            <div class="box-body">
                <?php if (isset($output)) { ?>
                    <?php foreach ($css_files as $file): ?>
                        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
                    <?php endforeach; ?>
                    <?php foreach ($js_files as $file): ?>
                        <script src="<?php echo $file; ?>"></script>
                    <?php endforeach; ?>
                    <?php
                    echo $output;
                }
                else {
                    ?>
                    <h5>Pilih Kategori yang ingin tambahkan foto</h5>
                <?php } ?>
            </div>
        </section>
    </div>
</div>