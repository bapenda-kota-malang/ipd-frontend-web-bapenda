<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/harga-resource/entry.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-2 text-left">No. Dokumen</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Provinsi</div>
				<div class="col">
					<select name="" id="" class="form-control">
						<option value="">Pilih Provinsi</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Dati II</div>
				<div class="col">
					<select name="" id="" class="form-control">
						<option value="">Pilih Dati II</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">NIP Petugas</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>

			<div class="row mt-2">
				<div class="col-2 text-left">Tanggal Pendataan</div>
				<div class="col">
					<input type="date" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row">
				<div class="col-2 text-left">Tahun</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Kode Group Resources</div>
				<div class="col">
					<select name="" id="" class="form-control">
						<option value="">Pilih Kode Group Resources</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">NIP Pemeriksa</div>
				<div class="col">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-2 text-left">Tanggal Pemeriksaan</div>
				<div class="col">
					<input type="date" class="form-control">
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mt-4">
	<div class="card-header h6 mb-0">
		Data Resource
	</div>
	<div class="p-3">
		<table class="table">
			<thead>
				<tr>
					<th>KD</th>
					<th>Nama Resource</th>
					<th>Satuan Resource</th>
					<th>Harga Resource Lama</th>
					<th>Harga Resource Baru</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in resources">
					<td>
						<input type="text" class="form-control" />
					</td>
					<td><input type="text" class="form-control" /></td>
					<td><input type="text" class="form-control" /></td>
					<td>
						<input type="text" class="form-control" />
					</td>
					<td>
						<input type="text" class="form-control" />
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



<div class="d-flex align-items-center justify-content-center mt-4 gap-2">
	<div class="">
		<button class="btn btn-block btn-primary">Simpan</button>
	</div>
	<div class="">
		<button class="btn btn-block btn-danger">Batal</button>
	</div>
</div>