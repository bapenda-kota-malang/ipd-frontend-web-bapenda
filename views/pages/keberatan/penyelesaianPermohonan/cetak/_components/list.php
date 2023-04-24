<?php
use yii\web\View;
use app\assets\VueAppListAsset;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppListAsset::register($this);
VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/keberatan/cetak-penyelesaian.js?v=20221108a');
?>

<div class="card mb-4">
  <div class="card-body">
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor Pelayanan</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.nomorPelayanan1" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.nomorPelayanan2" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.nomorPelayanan3" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.nomorPelayanan4" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.nomorPelayanan5" type="text" class="form-control text-end me-2" style="width: 60px;">
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor SK</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.nomorSK" type="text" class="form-control me-2" style="width: 325px;" disabled>
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tanggal Cetak</div>
			<div class="col-1 text-center">:</div>
			<div class="col-1">
				<datepicker v-model="data.tanggalCetak" type="date" format="DD-MM-YYYY" />
			</div>
		</div>

		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tempat Pembayaran</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.tempatBayar1" type="text" class="form-control me-2" style="width: 40px;">
				<input v-model="data.tempatBayar2" type="text" class="form-control me-2" style="width: 40px;">
				<input v-model="data.tempatBayar3" type="text" class="form-control me-2" style="width: 40px;">
				<input v-model="data.tempatBayar4" type="text" class="form-control" style="width: 185px;" disabled>
			</div>
		</div>

		<hr>
		<div class="row justify-content-center align-items-center g-1 mb-2">
			<div class="col-2">
				<button type="button" class="btn btn-outline-secondary w-100">Proses</button>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-outline-secondary w-100">Batal</button>
			</div>
		</div>
	</div>
</div>
