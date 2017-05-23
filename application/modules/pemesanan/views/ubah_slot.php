<script>
	function getslot(){
		var tgl = $('#tanggal').val();
		//console.log(tgl);
		var idlap = <?php echo json_encode($aplikan[0]->lapangan); ?> ;
		//console.log(idlap);
		$.ajax({
            type: "POST",
            url: "<?php  echo base_url(); ?>index.php/pemesanan/u/getslot/"+tgl+"/"+idlap,
            success: function(data){
				//console.log(data);
                $("#idslot").html(data);
            }

        });
	}
</script>
<section class="content-header">
    <h1>
        Ubah Jadwal
        <small>Ubah Jadwal</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url("index.php/home/u") ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Ubah Jadwal </li>
    </ol>
</section>
<div class="content">
    <div class="box box-solid">
        <div class="box-header">
            <h3 class="box-title">Ubah Jadwal</h3>

        </div>
        <div class="panel-body">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
							<div class="col-md-6">
								<div class="box box-info">
									<div class="box-header">
										<h3 class="box-title">Pindah Jadwal - <?php echo $aplikan[0]->code; ?></h3>
									</div>
									<div class="box-body">
										<form data-abide method="POST" action="<?php echo base_url()?>index.php/pemesanan/s/submit_ubah_registrasi">
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Nama Lapangan
												</label>
											</div>
											<div class="col-lg-7">
												<select class="form-control" name="lapangan" id="lapangan">
													<option value="<?php echo $aplikan[0]->lapangan ?>"><?php echo $aplikan[0]->nama_lapangan; ?></option>
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Tanggal
												</label>
											</div>
											<div class="col-lg-7">
												<input type='date' name="date" class="form-control" id="tanggal" onchange="getslot()"/>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Jadwal
												</label>
											</div>
											<div class="col-lg-7">
												<select class="form-control" name="slot" id="idslot">
													
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-7">
												<input class="form-control" type="hidden" name="kodebooking" value="<?php echo $aplikan[0]->code ?>" />
											</div>
											<div class="col-lg-5">
												<input class="btn btn-primary" value="Pindah Jadwal" type="submit" />
											</div>
										</div>
									</form>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box box-warning">
									<div class="box-header">
										<h3 class="box-title">Jadwal Lama - <?php echo $aplikan[0]->code; ?></h3>
									</div>
									<div class="box-body">
										<form data-abide>
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Nama Lapangan
												</label>
											</div>
											<div class="col-lg-7">
												<select class="form-control" name="lapangan" id="lapangan" disabled>
													<option value="<?php echo $aplikan[0]->lapangan ?>"><?php echo $aplikan[0]->nama_lapangan; ?></option>
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Tanggal
												</label>
											</div>
											<div class="col-lg-7">
												<input type='text' name="date" class="form-control" id="tanggal" value="<?php echo $aplikan[0]->tanggal ?>" disabled/>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-lg-5">
												<label >
													Slot
												</label>
											</div>
											<div class="col-lg-7">
												<select class="form-control" name="slot" id="idslot" disabled>
													<option value=""><?php echo $aplikan[0]->nama_slot." ( ".$aplikan[0]->start." - ".$aplikan[0]->end." )"; ?></option>
												</select>
											</div>
										</div>
									</form>
									</div>
								</div>
							</div>
						</div>
						
                    </div>
                </div>
            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>