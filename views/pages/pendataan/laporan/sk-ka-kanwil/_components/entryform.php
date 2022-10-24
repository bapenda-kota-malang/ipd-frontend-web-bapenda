<?php

$data = [
	'SK Kanwil ZNT esk SISTEP',
	'SK Kanwil OP Dengan Nilai Individu',
	'SK Kanwil Pemantauan OP',
	'SK Kanwil ZNT SISMIOP',
	'Tabel Jalan Standar',
	'SK Kanwil DBKB',
];

?>
<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header h6 mb-0">Parameter Utama</div>
			<div class="p-3">
				<?php 
				$noRtRw = true;
				// $showTahun = true;
				$title = "Parameter Utama";
				include Yii::getAlias('@vwCompPath/bscope/fullarea-inputlist-col2.php');
				?>
				<hr />
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">Thn Pajak</div>
					<div class="col-md-3 col-lg-4 col-xl-3 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">No. Keputusan</div>
					<div class="col-md-3 col-lg-5 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
				<div class="row g-1">
					<div class="col-md-2 col-lg-3 col-xxl-2 pt-1">Tgl. Keputusan</div>
					<div class="col-md-3 col-lg-5 col-xl-4 mb-2"><input class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header h6 mb-0">
				Jenis Laporan
			</div>
			<div class="p-3">
				<?php for($i = 0; $i < count($data); $i++) { ?>
				<div class="form-check mb-2">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
					<label class="form-check-label" for="flexRadioDefault1">
						<?= $data[$i] ?>
					</label>
				</div>
				<?php } ?>
			</div>
			<div style="height:118px;"></div>
		</div>
	</div>
</div>
