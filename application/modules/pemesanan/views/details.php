<?php 
	if($aplikan[0]->status == 1 || $flag_api == 1){
		$warna = "success";
	}
	else{
		$warna = "danger";
	}
	?>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="alert alert-<?php echo $warna; ?> alert-dismissable">
            <i class="fa fa-<?php if($aplikan[0]->status != 1 || $flag_api != 1) { echo "ban"; } else { echo "check";}?>"></i>
            <?php if ($aplikan[0]->status != 1 && $flag_api != 1) { ?><b>Pembayaran Kode Booking <?php echo $aplikan[0]->code; ?> - Belum Lunas!</b><br> Biaya Inap yang belum dibayar sebesar Rp. <?php
					echo $amount_api;
            }

            else
                echo "<b>Pembayaran Kode Booking ".$aplikan[0]->code." - Telah Lunas<b>";
                ?>
            
        </div>
    </div>
    <div class="col-md-3">
        <div class="btn-group">
            <button type="button" class="btn btn-info btn-flat">Pilihan</button>
            <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#" data-toggle="modal" data-target="#modalkonfirmasi">Batalkan Pesanan</a></li>
                <?php if ($flag_api != 1) { ?>
                    <li><a href="#" data-toggle="modal" data-target="#modalpembayaran">Bayar</a></li>
                <?php }  ?>
            </ul>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-6">
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Pemesan</h3>
    </div>
    <div class="box-body">
        <div class="row form-group">
            <div class="col-lg-3">
                <label >
                    No. Identitas
                </label>
            </div>
            <div class="col-lg-9">
                <input readonly class="form-control" type="text" placeholder="Identitas Diri" id="iddiri" value="<?php echo $aplikan[0]->no_identitas; ?>" name="iddiri" disabled/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-3">
                <label >
                    Nama
                </label>
            </div>
            <div class="col-lg-9">
                <input readonly class="form-control" type="text" placeholder="Nama" id="nama" value="<?php echo $aplikan[0]->nama_pemesan; ?>" name="nama" disabled/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-3">
                <label >
                    Telp
                </label>
            </div>
            <div class="col-lg-9">
                <input readonly class="form-control" type="tel" placeholder="Telepon " value="<?php echo $aplikan[0]->telp_pemesan; ?>" id="telp" name="telp" disabled/>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-lg-3">
                <!--<label for="email" class="oxigenfont left inline" style="color: black">-->
				<label>
                    Email
                </label>
            </div>
            <div class="col-lg-9">
                <input readonly class="form-control" type="text" placeholder="Email" value="<?php echo $aplikan[0]->email_pemesan; ?>" id="email" name="email" disabled/>
            </div>
        </div>
    </div>
    </div>
    </div>
    
    <div class="col-md-6">
    <div class="box box-warning">
    <div class="box-header">
        <h3 class="box-title">Lapangan</h3>
    </div>
    <div class="box-body">
        <table class="table table-striped">
            <tr>
                <th>Nama Lapangan</th>
                <th>Slot</th>
                <th>Mulai</th>
				<th>Selesai</th>
                <th>#</th>
            </tr>
                <tr>
                    <td><?php echo $aplikan[0]->nama_lapangan; ?></td>
                    <td><?php echo $aplikan[0]->nama_slot; ?></td>
                    <td><?php echo $aplikan[0]->start; ?></td>
                    <td><?php echo $aplikan[0]->end; ?></td>
                    <td>
                        
<!--                        <a href="<?php echo base_url() ?>index.php/pemesanan/admin/ubah_registrasi/<?php echo $aplikan[0]->CODE_BOOKING ?>/<?php echo $d->ID_KAMAR ?>/<?php echo $d->ID_SUBMIT ?>" class="btn btn-primary">Ubah</a>-->
                        <div class="btn-group">
                            <button type="button" class="btn btn-info btn-flat">Pilihan</button>
                            <button type="button" class="btn btn-info btn-flat dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo base_url() ?>index.php/pemesanan/s/ubah_registrasi/<?php echo $aplikan[0]->code; ?>/<?php echo $aplikan[0]->idpemesanan; ?>" >Ubah</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
        </table>
    </div>
    </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
    <div class="box box-danger">
    <div class="box-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="callout callout-danger">
                    <h4>Total Pembayaran</h4>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label >
                                Kekurangan Pembayaran 
                           </label>
                        </div>
                        <div class="col-lg-9">
                            <input readonly class="form-control" type="text" value="<?php 
								echo $amount_api;
								?>" />
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label >
                                Total Biaya 
                           </label>
                        </div>
                        <div class="col-lg-9">
                            <input readonly class="form-control" type="text" value="<?php 
												echo $amount_api;
                                                ?>" />
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>

<div class="row form-group">
    <div class="col-md-12">
    <div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Biaya Lapangan</h3>
    </div>
    <div class="box-body">
        <table class="table table-condensed">
            <thead>
                <tr>
                    <!--<th width="15%">No. Identitas</th>-->
                    <th >Nama Lapangan</th>
                    <th >Tanggal dipesan</th>
                    <th >Nama slot</th>
                    <th >Mulai</th>
                    <th >Selesai</th>
                    <!--<th width="12%">Jumlah Kamar</th>-->
                    <th >Biaya Lapangan</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>
                            <?php echo $aplikan[0]->nama_lapangan; ?>
                        </td>
                        <td>
                            <?php echo $aplikan[0]->tanggal; ?>
                        </td>
                        <td>
                            <?php echo $aplikan[0]->nama_slot; ?>
                        </td>
                        <td>
                            <?php echo $aplikan[0]->start; ?>
                        </td>
                        <td>
                            <?php echo $aplikan[0]->end; ?>
                        </td>
                        <td>
                            <?php 
                                echo "Rp. " . $aplikan[0]->total;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total : </td>
                        <td>Rp. 
                            <?php 
                               echo $amount_api;
                            ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
    </div>
    </div>
</div>


<div id="modalkonfirmasi" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Pesanan Ini Akan Dibatalkan?</h3>
            </div>
            <div class="modal-body">
                    <div class="box-body">
                        <form method="POST" action="<?php echo base_url() ?>index.php/pemesanan/admin/batalkanpesanan">
                            <div class="row">
                                <input type="hidden" name="cb" value="<?php echo $aplikan[0]->CODE_BOOKING; ?>"/>
                                <div class="col-lg-4">
                                    <label >
                                    </label>
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" value="Ya" class="btn btn-danger"/>
                                </div>
                                <div class="col-lg-2 ">
                                    <a href="#" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Tidak</a>
                                </div>
                                <div class="col-lg-4">
                                    <label >
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>

<div id="modalpembayaran" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Modal Pembayaran</h3>
            </div>
            <div class="modal-body">
                    <div class="box-body">
                        <form method="POST" action="<?php echo base_url() ?>index.php/pembayaran/admin/pay">
                            <div class="row row form-group">
                                <div class="col-md-4">
                                    <input type="hidden" name="jmlkamar" value="<?php $a=0; foreach ($angsuran as $data1) {$a++;} echo $a; ?>"/>
                                    <input type="hidden" name="idsubmitnya" value="<?php echo $angsuran[0]->ID_SUBMIT; ?>"/>
                                    <input type="hidden" name="kode_booking" value="<?php echo $aplikan[0]->CODE_BOOKING; ?>"/>
                                </div>
                                <div class="col-md-8">
                                    
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label>No. Identitas</label>
                                </div>
                                <div class="col-lg-8">
                                    <input readonly type="text" value="<?php echo $angsuran[0]->NRP_APLIKAN; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Jenis Kamar</label>
                                </div>
                                <div class="col-lg-8">
                                    <input readonly type="text" value="<?php echo $angsuran[0]->nama_jenis_kamar; ?>" class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Nominal Bayar</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" value="" name="nominal" placeholder="Rp " class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Tanggal Bayar</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="date" value="" name="tanggal" class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Via</label>
                                </div>
                                <div class="col-lg-8">
                                    <select  type="text" name="via" id="via" class="form-control">
                                        <option value="Tunai" >Tunai/Edisi</option>
                                        <option value="Transfer" >Transfer</option>
                                        <option value="Kredit">Kredit</option>
                                    </select>
                                </div>
                            </div>
							<div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Rekening Penerima</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" value="" placeholder="Nomor rekening penerima" name="rekening" class="form-control"/>
                                </div>
                            </div>
							<div class="row form-group">
                                <div class="col-lg-4">
                                    <label>Bank Penerima</label>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" value="" placeholder="Kode Bank penerima" name="bank" class="form-control"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-4">
                                    <input type="submit" value="Simpan" class="btn btn-primary"/>
                                </div>
                                <div class="col-lg-4">
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>