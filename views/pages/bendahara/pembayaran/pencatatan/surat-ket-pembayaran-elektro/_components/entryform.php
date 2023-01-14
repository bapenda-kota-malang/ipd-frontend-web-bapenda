<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

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
		<div class="row">
			<div class="col-2">NOP</div>
			<div class="col-8"><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
		</div>
		<div class="row mt-2">
			<div class="col-2">Nomor Surat</div>
			<div class="col-4">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-2">Tahun Pajak</div>
			<div class="col-2">
				<input type="text" class="form-control">
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />