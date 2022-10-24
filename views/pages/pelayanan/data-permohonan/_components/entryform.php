<?php 

include Yii::getAlias('@dataPath').'/penerimaanBerkas.php';
$pbBlockCount = ceil(count($penerimaanBerkasData) / 3);
$pbSplit = $pbBlockCount;

?>
<div class="card mb-4">
	<div class="card-header">Data Pelayanan</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Pelayanan</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Status Kolektif</div>
					<div class="col-md-6">
						<select class="form-control">
							<option value="">Individu</option>
							<option value="">Masal / Kolektif</option>
						</select>
					</div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">No Surat Permohonan</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Jenis Pelayanan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Penerimaan</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Perkiraan Selesai</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tgl Surat Permohonan</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Data Wajib Objek Pajak</div>
	<div class="card-body">
		<div class="row">
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">NOP</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Nama Wajib Pajak</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Letak Objek Pajak</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Keterangan</div>
					<div class="col-md-6 col-lg-10 col-xl-8"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-xl">
				<div class="row g-0 mb-3">
					<div class="col-md-3 col-lg-2 col-xl-4 pt-1">Tahun Pajak</div>
					<div class="col-md-6"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>
	
<div class="card mb-4">
	<div class="card-header">Penerimaan Berkas</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg">
				<?php foreach($penerimaanBerkasData as $key => $item) { ?>
				<?php
				if($key == $pbSplit) {
					echo '</div><div class="col-lg">';
					$pbSplit += $pbBlockCount;
				}
				?>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="check<?= $key ?>">
					<label class="form-check-label" for="check<?= $key ?>">
						<?= ($key + 1).'. '.$item ?>
					</label>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
	
