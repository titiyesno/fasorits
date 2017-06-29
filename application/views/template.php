<div>
	<p style="margin-top:95px; font-size:120%; margin-left:290px; line-height:70%;"><?php echo $aplikan[0]->nama_pemesan; ?></p>
	<p style="font-size:120%; margin-left:290px; line-height:70%;"><?php echo $aplikan[0]->no_identitas; ?></p>
	<p style="font-size:120%; margin-left:290px; line-height:50%;"><?php echo $aplikan[0]->telp_pemesan; ?></p>
	<p style="font-size:120%; margin-left:290px; line-height:40%;"><?php echo date("D / d M Y", strtotime($aplikan[0]->tanggal)) ?></p>
	<br>
	<br>
	<br>
	<p style="font-size:120%; margin-left:290px; line-height:50%;"><?php echo $aplikan[0]->start.' - '.$aplikan[0]->end.' / '.$aplikan[0]->nama_lapangan; ?></p>
	<p style="font-size:120%; margin-left:290px; line-height:40%;"><?php echo 'Rp. '.$aplikan[0]->total; ?></p>
</div>