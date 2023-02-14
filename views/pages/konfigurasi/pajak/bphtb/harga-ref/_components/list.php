<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerJsFile('@web/js/helper/dummy.js?v=20230214a');
$this->registerJsFile('@web/js/services/dummy/all.js?v=20221108b');

?>
<table class="table">
	<thead>
		<tr>
			<th>Alamat</th>
			<th>Kelurahan</th>
			<th>Kecamatan</th>
			<th>Harga</th>
			<th style="width:60px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-for="item in data">
			<td>{{item.alamatWp}}</td>
			<td>{{item.kelurahan}}</td>
			<td>{{item.kecamatan}}</td>
			<td>{{item.nilai1}}</td>
			<td>
				<div class="btn-group">
					<button class="btn btn-outline-primary border-slate-300 dropdown-toggle no-arrow" data-bs-toggle="dropdown" aria-expanded="false">
						<i class="bi bi-three-dots-vertical"></i>
					</button>
					<ul class="dropdown-menu dropdown-menu-end" style="width:150px">
						<li><button @click="showEntry(idx)" class="dropdown-item"><i class="bi bi-pencil me-1"></i> Edit</button></li>
						<li><button @click="showDel(idx)" class="dropdown-item"><i class="bi bi-x-lg me-1"></i> Hapus</button></li>
					</ul>
				</div> 
			</td>
		</tr>
	</tbody>
</table>

<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3 pt-1">Alamat</div>
					<div class="col mb-2">
						<input v-model="entryData.nama" class="form-control">
						<span class="text-danger" v-if="entryDataErr.nama">{{entryDataErr.nama}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kecamatan</div>
					<div class="col mb-2">
						<input v-model="entryData.nama" class="form-control">
						<span class="text-danger" v-if="entryDataErr.nama">{{entryDataErr.nama}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Kelurahan</div>
					<div class="col mb-2">
						<input v-model="entryData.nama" class="form-control">
						<span class="text-danger" v-if="entryDataErr.nama">{{entryDataErr.nama}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 pt-1">Harga</div>
					<div class="col">
						<input v-model="entryData.nama" class="form-control">
						<span class="text-danger" v-if="entryDataErr.nama">{{entryDataErr.nama}}</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button @click="submitEntry" class="btn bg-blue"><i class="bi bi-check-lg"></i> Simpan</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>

