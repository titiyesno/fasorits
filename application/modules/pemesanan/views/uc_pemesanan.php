<div class="tabs">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab4-1" data-toggle="tab"><i class="icon-star"></i>Umum</a></li>
        <li class=""><a href="#tab4-2" data-toggle="tab">Dosen, Tenaga Kependidikan, dan Mahasiswa</a></li>
        <li class=""><a href="#tab4-3" data-toggle="tab">Khusus</a></li>
    </ul>
    <div class="tab-content">
        <div class="active tab-pane" id="tab4-1">
            <form method="POST" action="<?php echo site_url() ?>/pemesanan/u/umum">
                <div class="form-group">
                    <label>No KTP/SIM</label>
                    <input class="form-control" type="text" name="noid" placeholder="Isi dengan no KTP atau NRP anda" />
                </div>
                <div class="form-group">
                    <label>Nama </label>
                    <input class="form-control" type="text" name="nama" placeholder="Isi dengan nama anda" />
                </div>
                <div class="form-group">
                    <label>Telepon </label>
                    <input class="form-control" type="text" name="telp"  placeholder="Isi dengan telepon anda" />
                </div>
                <div class="form-group">
                    <label>Email </label>
                    <input class="form-control" type="email" name="email"  placeholder="Isi dengan email anda" />
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <div class='input-group date' id='datetimepicker5'>
                        <input type='text' name="date" readonly="" class="form-control" />
                        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Lapangan </label>
                    <select class="form-control" name="jenis">
                        <?php foreach ($olahraga as $data2) { ?>
                            <option value="<?php echo $data2->id; ?>"><?php echo $data2->olahraga . " - " . $data2->lapangan; ?></option>
                        <?php } ?>
                    </select>
                </div>
				<div class="form-group">
                    <label>Kegiatan </label>
                    <select class="form-control" name="kegiatan">
						<option value="">Pilih kegiatan</option>
						<option value="latihan_insidentil">Latihan Insidentil</option>
						<option value="latihan_rutin">Latihan Rutin</option>
						<option value="turnamen">Event/Turnamen</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Slot </label>
                    <select class="form-control" name="slot">
						<option value="">Pilih slot</option>
                        <?php foreach ($slot as $data3) { 
							if(in_array($data3->slot, $terisi)){?>
                            <option value="<?php echo $data3->slot; ?>" disabled><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>
							<?php }
							else{?>
							<option value="<?php echo $data3->slot; ?>"><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>	
							<?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    <input class="btn btn-info"  type="submit" name=""  placeholder="Isi dengan email anda" />
                </div>
            </form>
        </div>
        <div class="tab-pane" id="tab4-2">
            <form method="POST" action="<?php echo site_url() ?>/pemesanan/u/akademik">
                    <div class="form-group">
                        <label>NRP/NIP</label>
                        <input class="form-control" type="text" name="noid" placeholder="Isi dengan no NRP anda" />
                    </div>
                    <div class="form-group">
                        <label>Nama </label>
                        <input class="form-control" type="text" name="nama" placeholder="Isi dengan nama anda" />
                    </div>
                    <div class="form-group">
                        <label>Telepon </label>
                        <input class="form-control" type="text" name="telp"  placeholder="Isi dengan telepon anda" />
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input class="form-control" type="email" name="email"  placeholder="Isi dengan email anda" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <div class='input-group date' id='datetimepicker6'>
                            <input type='text' name="date" readonly="" class="form-control" id="form_tanggal" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lapangan </label>
                        <select class="form-control" name="jenis">
                            <?php foreach ($olahraga as $data2) { ?>
                                <option value="<?php echo $data2->id; ?>"><?php echo $data2->olahraga . " - " . $data2->lapangan; ?></option>
                            <?php } ?>
                        </select>
                    </div>
					<div class="form-group">
							<label>Kegiatan </label>
							<select class="form-control" name="kegiatan">
								<option value="">Pilih kegiatan</option>
								<option value="latihan_insidentil">Latihan Insidentil</option>
								<option value="latihan_rutin">Latihan Rutin</option>
								<option value="turnamen">Event/Turnamen</option>
							</select>
						</div>
                    <div class="form-group">
                        <label>Slot </label>
                        <select class="form-control" name="slot">
                            <option value="">Pilih slot</option>
                        <?php foreach ($slot as $data3) { 
							if(in_array($data3->slot, $terisi)){?>
                            <option value="<?php echo $data3->slot; ?>" disabled><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>
							<?php }
							else{?>
							<option value="<?php echo $data3->slot; ?>"><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>	
							<?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info"  type="submit" name=""  placeholder="Isi dengan email anda" />
                    </div>
            </form>
        </div>
        <div class="tab-pane" id="tab4-3">
            <form method="POST" action="<?php echo site_url() ?>/pemesanan/u/khusus">
                <div class="active tab-pane" id="tab4-1">
                    <div class="form-group">
                        <label>No ID</label>
                        <input class="form-control" type="text" name="noid" placeholder="Isi dengan no NRP anda" />
                    </div>
                    <div class="form-group">
                        <label>Nama </label>
                        <input class="form-control" type="text" name="nama" placeholder="Isi dengan nama anda" />
                    </div>
                    <div class="form-group">
                        <label>Telepon </label>
                        <input class="form-control" type="text" name="telp"  placeholder="Isi dengan telepon anda" />
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input class="form-control" type="email" name="email"  placeholder="Isi dengan email anda" />
                    </div>
					<div class="form-group">
                    <label>Kegiatan </label>
						<select class="form-control" name="kegiatan">
							<option value="">Pilih kegiatan</option>
							<option value="latihan_insidentil">Latihan Insidentil</option>
							<option value="latihan_rutin">Latihan Rutin</option>
							<option value="turnamen">Event/Turnamen</option>
						</select>
					</div>
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type='date' name="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai</label>
                        <input type='date' name="date" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Hari</label>
                        <select class="form-control" name="jenis">
                            <option>Senin</option>
                            <option>Selasa</option>
                            <option>Rabu</option>
                            <option>Kamis</option>
                            <option>Jumat</option>
                            <option>Sabtu</option>
                            <option>Minggu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Slot </label>
                        <select class="form-control" name="slot">
                            <option value="">Pilih slot</option>
                        <?php foreach ($slot as $data3) { 
							if(in_array($data3->slot, $terisi)){?>
                            <option value="<?php echo $data3->slot; ?>" disabled><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>
							<?php }
							else{?>
							<option value="<?php echo $data3->slot; ?>"><?php echo $data3->nama . "  ( " . $data3->start . " - " . $data3->end . " )"; ?></option>	
							<?php }} ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info"  type="submit" name=""  placeholder="Isi dengan email anda" />
                    </div>
                </div>
            </form>
        </div>
    </div>							
</div>


<script type="text/javascript">
	var dayToday = new Date();
    var disabledDays = [
<?php
foreach ($data as $item) {
    echo '"', $item->date . '",';
}
?>
    ];
    $(function () {

        $('#datetimepicker5').datepicker({
            format: 'yyyy-mm-dd',
            beforeShowDay: daysDisabled
        });
        $('#datetimepicker6').datepicker({
            format: 'yyyy-mm-dd',
            beforeShowDay: daysDisabled
        });
    });
    function daysDisabled(date) {
        /*for (var i = 0; i < disabledDays.length; i++) {
            if (new Date(disabledDays[i]).toString() === date.toString()) {
                return false;
            }
        }*/
		if(date.valueOf() < (dayToday.valueOf()+(95177766 * 3))){
			return false;
		}
        return true;

    }
</script>