<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/cetak-sk/entry.js?v=20221108a');

?>

<div>
	<div class="row mt-2">
		<div class="col-2 text-left">No. Pelayanan</div>
		<div class="col-4">
			<input type="text" class="form-control">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Tanggal Cetak</div>
		<div class="col-4">
			<input type="date" name="" id="" class="form-control">
		</div>
	</div>

	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>Nomor Objek Pajak</th>
					<th>Nomor SK Pengurangan</th>
					<th>Nama Wajib Pajak</th>
					<th>Alamat Objek Pajak</th>
				</tr>
			</thead>
			<tbody>
				<tr class="" v-for="(item, index) in pengurangans">
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<input type="text" class="form-control">
					</td>
					<td>
						<button class="dropdown-item" type="button" @click="hapusData(index)">
							<i class="bi bi-trash me-1"></i>Hapus
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button class="btn bg-blue" @Click="newValue()">Tambah</button>
	</div>

</div>