<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221117a');
$this->registerJsFile('@web/js/dto/und-pemeriksaan/detail.js?v=20221108b');
$this->registerJsFile('@web/js/services/und-pemeriksaan/detail.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Pajak</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input v-model="data.jenisPajak" class="form-control" disabled/>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nomor Surat</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input v-model="data.suratPemberitahuan_id" class="form-control" disabled/>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tanggal</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input v-model="data.tanggalPemeriksaan" class="form-control" disabled/>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Keperluan</div>
			<div class="xc-md">
				<textarea v-model="data.notes" rows="10" class="form-control" disabled></textarea>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
