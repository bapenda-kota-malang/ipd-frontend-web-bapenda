<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-2 text-left">Provinsi</div>
				<div class="col">
					<select name="" id="" class="form-control">
						<option value="">Pilih Provinsi</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Dati II</div>
				<div class="col">
					<select name="" id="" class="form-control">
						<option value="">Pilih Dati II</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Tahun</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row mt-4">
	<div class="col-4">
		<button class="btn btn-block btn-primary">Cetak</button>
	</div>
</div>