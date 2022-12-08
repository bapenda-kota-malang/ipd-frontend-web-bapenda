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
				<div class="col-md-2 col-xl-1 pt-1 mb-1">Tahun</div>
				<div class="col-md-3 col-lg-2 col-xl-1 mb-2"><input class="form-control" /></div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />