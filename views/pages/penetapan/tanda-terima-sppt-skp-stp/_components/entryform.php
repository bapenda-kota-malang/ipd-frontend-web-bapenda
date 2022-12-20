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

<div class="mb-3">
	<div class="row">
		<div class="col-2 pt-1 text-end">Jenis Tanda Terima</div>
		<div class="col-1"><input class="form-control" /></div>
		<div class="col-3"><input class="form-control" /></div>
	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Data 2
	</div> -->
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col-2">NOP</div>
					<div class="col-7"><?php include Yii::getAlias('@vwCompPath/bscope/nop-input.php'); ?></div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-3">Tahun</div>
					<div class="col-3"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-1">Alamat OP</div>
			<div class="col-8">
				<textarea name="" id="" rows="4" class="form-control"></textarea>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-1">Nama WP</div>
			<div class="col-8">
				<input type="text" class="form-control">
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-1">Alamat WP</div>
			<div class="col-8">
				<textarea name="" id="" rows="4" class="form-control"></textarea>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<div class="row">
					<div class="col-3">Tanggal Terima</div>
					<div class="col-4">
						<datepicker v-model="data.tanggalNpwpd" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-3">Nama Penerima</div>
					<div class="col-5"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col">
				<div class="row">
					<div class="col-3">NIP Perekam</div>
					<div class="col-4"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-3">Nama Perekam</div>
					<div class="col-5"><input type="text" class="form-control"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />