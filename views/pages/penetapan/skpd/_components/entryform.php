<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/jenis-pajak.js?v=20230426a');
$this->registerJsFile('@web/js/dto/skpd/entry.js?v=20230127a');
$this->registerJsFile('@web/js/services/sptpd/entry-detail.js?v=20230501a'); // pinjam
$this->registerJsFile('@web/js/services/skpd/entry.js?v=20230501a');

$tglFieldName = 'tglSkpd';

?>
<div class="card mb-4">
	<div class="card-header">Data SPTPD</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-utama.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Detail Objek Pajak</div>
	<div class="p-3">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-pajak.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Estimasi Perhitungan Pajak</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-kalkulasi.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Riwayat SPT</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-riwayat.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Upload Dokumen</div>
	<div class="p-3">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt-form-upload.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Verifikator</div>
	<div class="p-3">
		<div class="row">
			<div class="col-md-4">
				<div class="row g-2 mb-1">
					<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Kabid</div>
					<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="row g-2 mb-1">
					<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Kasubid</div>
					<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="row g-2 mb-1">
					<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Petugas</div>
					<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <template v-if="rekening_objek == '04'">
	<div class="card mb-3">
		<div class="card-header">Perhitungan Jaminan Bongkar</div>
	</div>
	<div class="card-body">

	</div>
	</div>
</template> -->

<?php include Yii::getAlias('@vwCompPath/bscope/npwpd-search.php'); ?>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />