<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/dto/tanda-terima-sppt/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/tanda-terima-sppt/entryform.js?v=20221108b');

?>

<div class="alert alert-danger p-2" v-if="mainMessage.show">
	<i class="bi bi-exclamation-triangle"></i> {{mainMessage.content}}
</div>

<div class="mb-3">
	<div class="row">
		<div class="col-2 pt-1 text-end">Jenis Tanda Terima</div>
		<div class="col-1"><input class="form-control" /></div>
		<div class="col-3"><input class="form-control" /></div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="row">
					<div class="col-4">NOP</div>
					<div class="col-8">
						<?php
						$nopName = 'nopFields';
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-2">Tahun</div>
					<div class="col-3">
						<input type="text" class="form-control" v-model="data.tahunPajakSppt">
					</div>
					<div class="col">
						<button class="btn btn-primary" @click="onClickBtnCari">Cari</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-2">Alamat OP</div>
			<div class="col-8">
				<textarea name="" id="" rows="4" class="form-control" disabled></textarea>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-2">Nama WP</div>
			<div class="col-8">
				<input type="text" class="form-control" disabled>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col-2">Alamat WP</div>
			<div class="col-8">
				<textarea name="" id="" rows="4" class="form-control" disabled></textarea>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col">
				<div class="row">
					<div class="col-4">Tanggal Terima</div>
					<div class="col-4">
						<datepicker format="DD/MM/YYYY" v-model="data.tglTerimaWpSppt" />
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-3">Nama Penerima</div>
					<div class="col-5"><input type="text" class="form-control" v-model="data.namaYgMenerimaSppt"></div>
				</div>
			</div>
		</div>
		<div class="row mt-2">
			<div class="col">
				<div class="row">
					<div class="col-4">NIP Perekam</div>
					<div class="col-4"><input type="text" class="form-control" v-model="data.nipRekamTtrSppt" disabled></div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<div class="col-3">Nama Perekam</div>
					<div class="col-5"><input type="text" class="form-control" disabled></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />