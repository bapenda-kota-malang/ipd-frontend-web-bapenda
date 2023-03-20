<?php
use yii\web\View;
use app\assets\VueAppListAsset;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppListAsset::register($this);
VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/keberatan/cetak-pembetulan.js?v=20221108a');
?>

<div class="card mb-4">
	<div class="card-body">
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Kanwil</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.kanwilId" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.kanwilName" type="text" class="form-control text-uppercase" style="width: 280px;" disabled>
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">KP PBB</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.kppbbId" type="text" class="form-control text-end me-2" style="width: 40px;" disabled>
				<input v-model="data.kppbbName" type="text" class="form-control text-uppercase" style="width: 280px;" disabled>
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor Pelayanan</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.pelayanan1" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.pelayanan2" type="text" class="form-control text-end me-2" style="width: 60px;">
				<input v-model="data.pelayanan3" type="text" class="form-control text-end me-2" style="width: 60px;">
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">NOP</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4">
				<?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?>
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Nomor SK</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.nomorSK1" type="text" class="form-control text-end me-2" style="width: 80px;">
				<input v-model="data.nomorSK2" type="text" class="form-control text-end me-2" style="width: 240px;">
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tanggal Cetak</div>
			<div class="col-1 text-center">:</div>
			<div class="col-1">
				<datepicker v-model="data.tanggalSK" type="date" format="DD-MM-YYYY" />
			</div>
		</div>
		<div class="row align-items-center g-0 mb-2">
			<div class="col-2">Tempat Pembayaran</div>
			<div class="col-1 text-center">:</div>
			<div class="col-4 d-flex">
				<input v-model="data.tempatBayar1" type="text" class="form-control text-end me-2" style="width: 30px;">
				<input v-model="data.tempatBayar2" type="text" class="form-control text-end me-2" style="width: 30px;">
				<input v-model="data.tempatBayar3" type="text" class="form-control text-end me-2" style="width: 30px;">
				<input v-model="data.tempatBayarText" type="text" class="form-control text-end me-2" style="width: 215px;">
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
