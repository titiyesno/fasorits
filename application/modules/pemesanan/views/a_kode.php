<link href="<?php echo base_url() ?>/gui_modul/datepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

<section class="slice bg-3">
    <div class="w-section inverse">
        <div class="container">
            <div class="row">
				<div class="large-12 columns" style="min-height: 400px">
					<center>
						<h1 class="oxigenfontblue" >Total Biaya Rp. <?php echo $total;?></h1>
						<br>
						<h2 class="oxigenfontblue" >Kode Pembayaran <b><?php echo $kode;?></b></h2>
						<br>
						<h4 style="color: red">
							<?php echo 'Simpan Kode Booking untuk melakukan pembayaran' ?>
						</h4>
						<br>
						<h4>
							<?php echo 'Lakukan konfirmasi kepada Admin dengan membawa KTM atau kartu identitas yang bersangkutan' ?>
						</h4>
						<!--<h4 style="color: red">
							Batas Waktu Pembayaran dan Konfirmasi : <?php echo $expired;  ?> WIB
						</h4>-->
					</center>
				</div>
            </div>
        </div>
    </div>
</section>