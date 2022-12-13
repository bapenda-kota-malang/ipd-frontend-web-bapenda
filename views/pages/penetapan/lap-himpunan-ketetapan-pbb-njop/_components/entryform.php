<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/npwpd/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/salinan-sppt-pbb/entryform.js?v=20221108b');

?>

<?php
$noRtRw = true;
$showTahun = true;
include Yii::getAlias('@vwCompPath/bscope/fullarea-inputblock.php');
?>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Data 2
	</div> -->
	<div class="card-body">
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				1. Himpunan Ketetapan PBB Sektor Pedesaan
			</label>
		</div>
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				2. Himpunan Ketetapan PBB Sektor Perkotaan
			</label>
		</div>
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				3. Himpunan Ketetapan PBB Sektor Pedesaan dan Perkotaan
			</label>
		</div>
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				4. Himpunan Ketetapan PBB per Golongan Buku Ketetapan per Kecamatan
			</label>
		</div>
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				5. Himpunan NJOP per Kelurahan
			</label>
		</div>
		<div class="form-check mb-2">
			<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
			<label class="form-check-label" for="flexRadioDefault1">
				5. Himpunan Nama Wajib Pajak per Kelurahan
			</label>
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
					<div class="col-2 text-left mt-2">Buku :</div>
					<div class="col-7">
						<vueselect v-model="data.buku_id" :options="bukuOpts" :reduce="item => item.id" label="name" code="id" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />