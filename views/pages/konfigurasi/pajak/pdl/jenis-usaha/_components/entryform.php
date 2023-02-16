<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/konfigurasi/pajak/pdl/jenis-usaha/entry.js?v=20221117a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Jenis Usaha
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group">
					<label for="">Kode</label>
					<input type="text" name="" id="" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Jenis Usaha</label>
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Rekening
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>Kode Rekening</th>
						<th>Nama Rekening</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="(item, idx) in rekenings">
						<td><input class="form-control" /></td>
						<td><input class="form-control" /></td>
						<td>
							<button class="dropdown-item" type="button" @click="removeRekening(idx)">
								<i class="bi bi-trash me-1"></i>Hapus
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- btn tambah -->
		<div class="row">
			<div class="col-12">
				<button class="btn btn-primary" @click="addRekening">Tambah</button>
			</div>
		</div>
	</div>
</div>