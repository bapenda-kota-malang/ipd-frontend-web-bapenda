<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/helper/jenis-pajak.js?v=20230426a');
$this->registerJsFile('@web/js/dto/skpd/detail.js?v=20230520a');
$this->registerJsFile('@web/js/services/skpd/detail.js?v=20230520a');

?>
<div class="card mb-4">
	<div class="card-header">Data SPTPD</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-utama.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Detail Objek Pajak</div>
	<div class="p-3">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-pajak.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Estimasi Perhitungan Pajak</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-kalkulasi.php'); ?>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Riwayat SPT</div>
	<div class="card-body">
		<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-riwayat.php'); ?>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Lampiran</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<div v-else>
			<?php include Yii::getAlias('@vwCompPath/bscope/spt/spt-detail-upload.php'); ?>
		</div>
	</div>
</div>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
<input type="hidden" id="id" value="<?= $id ?>" />
