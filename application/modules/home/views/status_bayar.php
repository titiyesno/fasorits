
<div class="pg-opt pin">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Status Pembayaran</h2>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
<section class="slice" style="padding:25px 0;">
    <div class="w-section inverse">
        <div class="container">
            <div class="row">
				<?php if($flag == 1) {?>
                <table class="table table-hover" style="width:75%; margin-left:150px">
					<thead>
					  <tr>
						<th>Kode Pembayaran</th>
						<th><?php echo $kode_bayar; ?></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Nama</td>
						<td><?php echo $nama; ?></td>
					  </tr>
					  <tr>
						<td>Lapangan</td>
						<td><?php echo $aplikan[0]->nama_lapangan; ?></td>
					  </tr>
					  <tr>
						<td>Slot</td>
						<td><?php echo $aplikan[0]->nama_slot." ( ".$aplikan[0]->start." - ".$aplikan[0]->end." )"; ?></td>
					  </tr>
					  <tr>
						<td>Total Bayar</td>
						<td><?php echo $total; ?></td>
					  </tr>
					  <tr>
						<td>Batas Pembayaran</td>
						<td><?php echo $batas; ?></td>
					  </tr>
					  <tr>
						<td>Status Pembayaran</td>
						<td><?php echo $status; ?></td>
					  </tr>
					</tbody>
				  </table>
				<?php } else {?>
				<h4 style="text-align:center"> Data Tidak Ditemukan</h4>
				<?php } ?>
            </div>
        </div>
    </div>
</section>

