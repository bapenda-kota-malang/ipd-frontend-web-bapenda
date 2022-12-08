<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/npwpd/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/pendaftaran-wp/entryform.js?v=20221108b');

?>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Data 2
	</div> -->
	<div class="card-body">
		<?php
		$noRtRw = true;
		$showTahun = true;
		// include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
		?>

		<div class="">
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Provinsi</div>
				<div class="col-2 col-md-1"><input class="form-control" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Dati II</div>
				<div class="col-2 col-md-1"><input class="form-control" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Kecamatan</div>
				<div class="col-2 col-md-1"><input class="form-control" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Kelurahan</div>
				<div class="col-2 col-md-1"><input class="form-control" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1 mb-1">Tahun Pajak</div>
				<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
			</div>
		</div>

		<div class="p-3">
			<table style="font-size:9pt" align="center">
				<thead>
					<tr>
						<th class="text-center"> </th>
						<th class="text-center">Buku 1</th>
						<th class="text-center">Buku 2</th>
						<th class="text-center">Buku 3</th>
						<th class="text-center">Buku 4</th>
						<th class="text-center">Buku 5</th>
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td>Tgl Jatuh Tempo </td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
					</tr>
					<tr>
						<td>Tgl Terbit </td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
						<td><input type="text" class="form-control mb-2"></td>
					</tr>
				</tbody>
			</table>
		</div>

	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Jenis Cetakan
	</div> -->
	<div class="card-body">
		<div class="row g-1">
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">Jumlah OP :</div>
					<div class="col-7"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">OP ke :</div>
					<div class="col-7"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">NOP</div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-3"><input type="text" class="form-control"></div>
					<div class="col-2"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />