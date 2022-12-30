<?php 

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/dto/kelas-tanah/list.js?v=20221108a');
$this->registerJsFile('@web/js/services/kelas-tanah/entryform.js?v=20221108b');

?>
<div class="card mb-3 col-8">
	<div class="card-header h6 mb-0">
		Data Kelas Tanah
	</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Kode Kelas</div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.kdTanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Tahun Awal</div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.tahunAwalKelasTanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Tahun Akhir</div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.tahunAkhirKelasTanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Nilai Min</div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.nilaiMinTanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-9">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-2 pt-1">Nilai Max</div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.nilaiMaxTanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-9">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-2 pt-1">Nilai/m<sup>2</sup></div>
					<div class="col-sm-4 col-md-4 col-lg-4 pe-lg-5 mb-2"><input v-model="data.nilaiPerM2Tanah" type="text" class="form-control" /></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />