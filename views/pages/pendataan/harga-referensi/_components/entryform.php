<?php 

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/dto/harga-referensi/list.js?v=20221108a');
$this->registerJsFile('@web/js/services/harga-referensi/entryform.js?v=20221108b');

?>
<div class="card mb-3 col-8">
	<div class="card-header h6 mb-0">
		Data Harga Referensi
	</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Kecamatan</div>
					<div class="col-sm-4 col-md-4 col-lg-9 pe-lg-5 mb-2">
						<select v-model="data.kecamatanId" class="form-control">
							<option v-for="kecamatan in kecamatans" :value="kecamatan.id"></option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Kelurahan</div>
					<div class="col-sm-4 col-md-4 col-lg-9 pe-lg-5 mb-2">
						<select v-model="data.kelurahanId" class="form-control">
							<option v-for="kelurahan in kelurahans" :value="kelurahan.id"></option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Alamat</div>
					<div class="col-sm-4 col-md-4 col-lg-9 pe-lg-5 mb-2">
						<input v-model="data.alamat" class="form-control"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-lg-6">
				<div class="row g-1">
					<div class="col-sm-3 col-md-2 col-lg-3 pt-1">Harga</div>
					<div class="col-sm-4 col-md-4 col-lg-9 pe-lg-5 mb-2">
						<input v-model="data.harga" type="text" class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />