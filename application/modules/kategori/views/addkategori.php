<div class="col-sm-6">
    <section class="panel">
        <header class="panel-heading">
            Add New Category
            <span class="tools pull-right">
            </span>
        </header>
        <div class="panel-body">
            <?php
            echo form_open('kategori/s/addkategori');
            ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Kategori</label>
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Kategori">
            </div>
            <div class="form-group">
                
                <input type="submit" class="btn btn-success" value="Submit"/>
            </div>
            <?php echo form_close(); ?>
        </div>
    </section>
</div>