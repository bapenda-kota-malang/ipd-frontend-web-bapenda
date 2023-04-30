<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/penetapan/cetak-massal/massal.js?v=20221108a');
$this->registerJsFile('@web/js/services/penetapan/copydbkb/entry.js?v=20221108b');

?>

<div v-if="data.isLoading == true">
	<div class="overlay"></div>
	<div class="spanner show">
		<div class="loader"></div>
		<p>Sedang diproses...</p>
	</div>
</div>

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
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.provinsiID" @input="propinsiChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaPropinsi" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1">Dati II</div>
				<div class="col-2 col-md-1"><input class="form-control" v-model="data.kotaID" @input="kotaChanged($event)" /></div>
				<div class="col col-md-7 col-lg-6 col-xl-5 mb-2"><input class="form-control" v-model="data.namaKota" disabled /></div>
			</div>
			<div class="row g-0 g-md-1">
				<div class="col-md-2 col-xl-1 pt-1 mb-1">Tahun</div>
				<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" v-model="data.tahunPajak" /></div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<hr />
<div class="d-flex justify-content-center">
	<a href="<?= $cancelUrl ?>" class="btn bg-danger ms-2">
		<i class="bi bi-x-lg"></i> Batal
	</a>

	<button @click="submitData(data)" class="btn bg-blue ms-2">
		<i class="bi bi-check-lg"></i> Simpan
	</button>
</div>