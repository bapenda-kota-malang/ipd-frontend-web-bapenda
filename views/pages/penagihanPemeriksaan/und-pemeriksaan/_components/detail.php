<?php

use yii\web\View;
use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221201a');
$this->registerJsFile('@web/js/dto/und-pemeriksaan/detail.js?v=20221201a');
$this->registerJsFile('@web/js/services/und-pemeriksaan/detail.js?v=20221201a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Pajak</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="data.jenisPajak == 1 ? 'PDL' : 'PBB'" class="form-control" disabled/>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nomor Surat</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input :value="data.noSuratUndangan" class="form-control" disabled/>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tanggal/Jam</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<div class="row g-1">
					<div class="col-7">
						<input :value="data.tanggal ? data.tanggal.substr(0,10) : ''" class="form-control" disabled>
					</div>
					<div class="col">
						<input :value="data.pukul ? data.pukul.substr(0,5) : ''" class="form-control" disabled>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Tempat</div>
			<div class="xc-md mb-2">
				<textarea :value="data.tempat" rows="3" class="form-control" disabled></textarea>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Keperluan</div>
			<div class="xc-md">
				<textarea :value="data.keperluan" rows="5" class="form-control" disabled></textarea>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
