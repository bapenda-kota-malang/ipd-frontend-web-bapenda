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
		Jenis Cetakan
	</div> -->
	<div class="card-body">
		<div class="row g-1">
			<div class="col-4">
				<div class="row g-1">
					<div class="col-4 text-left">Tanggal Bayar</div>
					<div class="col-7">
						<datepicker v-model="data.tanggalBayar" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
			<div class="col-3"></div>
			<div class="col-5">
				<div class="row g-1">
					<div class="col-3 text-left">NOP</div>
					<div class="col-9">
						<?php
						include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
						?>
					</div>
				</div>
				<div class="row g-1 mt-2">
					<div class="col-3 text-left">Tahun Pajak</div>
					<div class="col-2">
						<input class="form-control" />
					</div>
					<div class="col-1"></div>
					<!-- <div class="col-3 text-left">Angka kontrol</div>
					<div class="col-2">
						<input class="form-control" />
					</div> -->
				</div>

			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pembayaran STTS
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Tagihan Atas</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row g-1">
					<div class="col-1"></div>
					<div class="col-4 text-left">Bank TP</div>
					<div class="col-2">
						<input class="form-control" />
					</div>
					<div class="col-5">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-body">
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">PBB Yang Harus Dibayar</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row g-1">
					<div class="col-1"></div>
					<div class="col-4 text-left">Pembayaran Ke-</div>
					<div class="col-2">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Besar Denda Adm.</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row g-1">
					<div class="col-1"></div>
					<div class="col-4 text-left">Pembayaran Pokok</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Total (PBB + Denda)</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row g-1">
					<div class="col-1"></div>
					<div class="col-4 text-left">Pembayaran Denda</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Sisa PBB Harus Dibayar</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="row g-1">
					<div class="col-1"></div>
					<div class="col-4 text-left">Besar PBB Yang Dibayar</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Tanggal Jatuh Tempo</div>
					<div class="col-7">
						<datepicker v-model="data.tanggalJthTempo" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-6">
				<div class="row">
					<div class="col-4 text-left">Status Pembayaran</div>
					<div class="col-7">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<!-- <div class="card-header fw-600">
		Jenis Cetakan
	</div> -->
	<div class="card-body">
		<div class="row g-1">
			<div class="col">
				<div class="row g-1">
					<div class="col-2 text-left">Tanggal Perekaman</div>
					<div class="col-2">
						<datepicker v-model="data.tanggalPerekaman" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col">
				<div class="row g-1">
					<div class="col-2 text-left">Nama Perekam</div>
					<div class="col-2"><input type="text" class="form-control"></div>
					<div class="col-4"><input type="text" class="form-control" disabled></div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />