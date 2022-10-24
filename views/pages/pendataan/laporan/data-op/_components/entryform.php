<?php

$data = [
	'DHR',
	'Laporan Data OP Ringkas',
	'Laporan DHR Urut NOP',
	'Laporan DHR Urut No. Formulir',
	'Laporan DHR Urut Nama',
	'Laporan DHR Urut Nama',
	'Laporan DHR Per Dati',
	'Rekap Obyek Pajak',
	'Rekap DHR Per Kecamatan',
	'Rekap DHR Per Kelurahan',
	'Rekap DHR OP Ind Per Dati II',
	'Rekap DHR OP Ind Per Kecamatan',
	'Rekap DHR OP Ind Per Kelurahan',
	'Laporan Perubahan Data OP',
	'Laporan Daftar OP Bersama',
	'Laporan Seajarah OP',
	'Laporan Peta Perubahan Kode Wilayah OP',
	'Laporan Rekapitulasi Peta Desa / Kelurahan',
	'Laporan Daftar NOP Belum Digunakan',
	'Laporan Daftar Rlasi NOP-KTP/NOPPEN',
	'Laporan Formulir Transaksi',
	'Laporan Ringkas Pelengkap Peta Blok',
	'Laporan Hasil Pemantauan Klasifikasi NJOP',
];

?>
<div class="card mb-3">
	<div class="card-header h6 mb-0">Parameter Utama</div>
	<div class="p-3">
		<?php 
		$noRtRw = true;
		// $showTahun = true;
		$title = "Parameter Utama";
		include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist.php');
		?>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1 mb-1">Thn Pajak Awal</div>
			<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
			<div class="col-md-2 col-xl-1 pt-1 mb-1"></div>
			<div class="col-md-2 col-xl-1 pt-1 mb-1">Thn Pajak Akhir</div>
			<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
		</div>

		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1 mb-1">NOP</div>
			<div class="col-md-3 col-lg-2 col-xl-2 mb-2">
				<div class="row g-1">
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-2"><input class="form-control" /></div>
				</div>
			</div>
			<div class="col-md-2 col-xl-1 pt-1 mb-1 text-center">S/D</div>
			<div class="col-md-3 col-lg-2 col-xl-2 mb-2">
				<div class="row g-1">
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1 mb-1">No Formulir</div>
			<div class="col-md-3 col-lg-2 col-xl-2 mb-2">
				<div class="row g-1">
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-2"><input class="form-control" /></div>
				</div>				
			</div>
			<div class="col-md-2 col-xl-1 pt-1 mb-1 text-center">S/D</div>
			<div class="col-md-3 col-lg-2 col-xl-2 mb-2">
			<div class="row g-1">
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-5"><input class="form-control" /></div>
					<div class="col-2"><input class="form-control" /></div>
				</div>				
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header h6 mb-0">
		Jenis Laporan Data Objek Pajak
	</div>
	<div class="p-3">
		<div class="row">
			<div class="col-md-4">
				<?php for($i = 0; $i < 8; $i++) { ?>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						<?= $data[$i] ?>
					</label>
				</div>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<?php for($i = 8; $i < 16; $i++) { ?>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						<?= $data[$i] ?>
					</label>
				</div>
				<?php } ?>
			</div>
			<div class="col-md-4">
				<?php for($i = 16; $i < count($data); $i++) { ?>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						<?= $data[$i] ?>
					</label>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
