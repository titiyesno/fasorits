<style>
    ul.tsc_pagination { margin:4px 0; padding:0px; height:100%; overflow:hidden; font:12px 'Tahoma'; list-style-type:none; }
    ul.tsc_pagination li { float:left; margin:0px; padding:0px; margin-left:5px; }

    ul.tsc_pagination li a { color:black; display:block; text-decoration:none; padding:7px 10px 7px 10px; }


    ul.tsc_paginationA li a { color:#FFFFFF; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; }

    ul.tsc_paginationA01 li a { color:#474747; border:solid 1px #B6B6B6; padding:6px 9px 6px 9px; background:#E6E6E6; background:-moz-linear-gradient(top, #FFFFFF 1px, #F3F3F3 1px, #E6E6E6); background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #FFFFFF), color-stop(0.02, #F3F3F3), color-stop(1, #E6E6E6)); }
    ul.tsc_paginationA01 li:hover a,
    ul.tsc_paginationA01 li.current a { background:#FFFFFF; }
</style>
<section class="content-header">
    <h1>
        Artikel dan Berita
        <small>Report</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/s") ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Berita</li>
    </ol>
</section>
<div class="content">
    <div class="col-md-12">
        <!--todolist start-->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Berita</h3>                                    
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                <div id="example1_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <div class="row"><div class="col-xs-6"></div><div class="col-xs-6"><div class="dataTables_filter" id="example1_filter"></div></div></div><table id="example1" class="table table-bordered table-striped dataTable" aria-describedby="example1_info">
                        <thead>
                            <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 189px;">Judul Artikel</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 277px;">Kategori</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 248px;">Penulis dan Waktu</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 115px;">Action</th></tr>
                        </thead>

                        <tfoot>
                            <tr><th rowspan="1" colspan="1">Judul Artikel</th><th rowspan="1" colspan="1">Kategori</th><th rowspan="1" colspan="1">Penulis dan Waktu</th><th rowspan="1" colspan="1">Action</th></tr>
                        </tfoot>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                            <?php foreach ($listberita as $data) { ?>
                                <tr class="odd">
                                    <td class=" sorting_1"><a href="<?php echo base_url("index.php/news/s/getberita/" . $data->idartikel); ?>"><?php echo $data->judul; ?></a></td>
                                    <td class=" "><?php echo $data->jenis_artikel; ?></td>
                                    <td class=" "><?php echo $data->nama; ?> - <?php echo $data->tanggal_buat; ?></td>

                                    <td class=" ">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-xs" type="button">Action<span class="caret"></span></button>
                                            <ul role="menu" class="dropdown-menu">
                                                <li><a href="<?php echo base_url('index.php/news/s/edit/' . $data->idartikel) ?>">Edit</a></li>
                                                <li><a href="<?php echo base_url('index.php/news/s/delete/' . $data->idartikel) ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="dataTables_info" id="example1_info">
                                filtered from <?php echo count($listberita); ?> total entries)
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="dataTables_paginate paging_bootstrap">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
