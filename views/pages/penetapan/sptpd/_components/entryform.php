<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/jenis-pajak.js?v=20230520a');
$this->registerJsFile('@web/js/vue-app/vue-helper-list.js?v=20230520a'); // god
$this->registerJsFile('@web/js/dto/sptpd/entry.js?v=20230302a');
$this->registerJsFile('@web/js/services/sptpd/entry-detail.js?v=20230501a');
$this->registerJsFile('@web/js/services/sptpd/entry.js?v=20230501a');

$tglFieldName = 'tglSptpd';

?>
<div class="card mb-4">
	<div class="card-header">Data SPTPD</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-form-utama.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Detail Objek Pajak</div>
	<div class="p-3">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-form-pajak.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Estimasi Perhitungan Pajak</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-form-kalkulasi.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Riwayat SPT</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-riwayat.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Upload Dokumen</div>
	<div class="p-3">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-form-upload.php'); ?>
	</div>
</div>

<?php include Yii::getAlias('@vwCompPath/bscope/npwpd/npwpd-search.php'); ?>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
