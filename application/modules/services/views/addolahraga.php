<div class="col-sm-6">
    <section class="panel">
        <header class="panel-heading">
            Tambah Cabang Olahraga
            <span class="tools pull-right">
            </span>
        </header>
        <div class="panel-body">
            <?php
            echo form_open('services/s/addolahraga');
            ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Olahraga</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori">
            </div>
            <div class="form-group">
                
                <input type="submit" class="btn btn-success" value="Submit"/>
            </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>