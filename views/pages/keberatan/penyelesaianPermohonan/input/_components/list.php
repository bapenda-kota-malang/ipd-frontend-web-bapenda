<?php
use yii\web\View;
use app\assets\VueAppListAsset;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppListAsset::register($this);
VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/keberatan/entry-penyelesaian.js?v=20221108a');
?>

<div class="card mb-4">
  <div class="card-body">
      <div class="row align-items-center g-1 mb-4">
				<div class="col-2">Nomor Pelayanan</div>
				<div class="col-4 d-flex align-items-center">
					<div class="me-2">:</div>
					<div class="me-2" style="width: 10%">
						<input v-model="data.numberService1" type="text" class="form-control">
					</div>
					<div class="me-2" style="width: 10%">
						<input v-model="data.numberService2" type="text" class="form-control">
					</div>
					<div class="me-2" style="width: 15.5%">
						<input v-model="data.numberService3" type="text" class="form-control">
					</div>
					<div class="me-2" style="width: 15.5%">
						<input v-model="data.numberService4" type="text" class="form-control">
					</div>
					<div class="me-2" style="width: 15.5%">
						<input v-model="data.numberService5" type="text" class="form-control">
					</div>
				</div>
			</div>	
			<div class="row align-items-center g-1 mb-4">
				<div class="col-2">Nomor SK Keberatan</div>
				<div class="col-4 d-flex align-items-center">
					<div class="me-2">:</div>
					<div class="me-2" style="width: 25%">
						<input v-model="data.numberSKStart" type="text" class="form-control">
					</div>
					<div class="me-2" style="width: 48%">
						<input v-model="data.numberSKEnd" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="row align-items-center g-1 mb-4">
				<div class="col-2">Tanggal SK Keberatan</div>
				<div class="col-1 d-flex align-items-center">
					<div class="me-2">:</div>
					<datepicker v-model="data.yearSK" type="year" format="YYYY" />
				</div>
			</div>
			<div class="row align-items-center g-1 mb-4">
				<div class="col-2">No. Laporan Hasil Penelitian</div>
				<div class="col-4 d-flex align-items-center">
					<div class="me-2">:</div>
					<div class="w-75">
						<input v-model="data.numberReport" type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="row align-items-center g-1 mb-4">
				<div class="col-2">Tanggal Laporan Hasil Penelitian</div>
				<div class="col-1 d-flex align-items-center">
					<div class="me-2">:</div>
					<datepicker v-model="data.yearReport" type="year" format="YYYY" />
				</div>
			</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-body">
		<table>
			<thead>
				<tr>
					<th>NOP</th>
					<th>Jenis Keputusan</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<div>
	<button class="btn bg-blue">Simpan</button>
</div>