<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/bidang-kerja/bidang-kerja.js?v=20221108a');
$this->registerJsFile('@web/js/services/bidang-kerja/bidang-kerja.js?v=20230520a');

?>
<table class="table">
	<thead>
		<tr>
			<th style="width:50px"></th>
			<th style="width:100px">Level</th>
			<th style="width:100px">Kode</th>
			<th>Nama</th>
			<th>Parent</th>
			<th style="width:100px"></th>
		</tr>
	</thead>
	<tbody>
		<tr v-if="data.length==0">
			<td colspan="7" class="p-4 text-center">Tidak ada data</td>
		</tr>
		<tr v-else v-for="(item, idx) in data" >
			<td></td>
			<td>{{item.level}}</td>
			<td>{{item.kode}}</td>
			<td>{{item.nama}}</td>
			<td>{{item.parent}}</td>
			<td class="text-end">
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
					<div class="col-md-2 pt-1">Level</div>
					<div class="col mb-2">
						<vueselect v-model="entryData.level"
							:options="levelBidangs"
							:reduce="item => item.id"
							label="nama"
							code="id"
							@option:selected="refreshSelect(entryData.level, levelBidangs, '/bidangkerja?level={kode}&no_pagination=true', parents, 'kode', 'kode')"
						/>
						<span class="text-danger" v-if="entryDataErr.alamat">{{entryDataErr.level}}</span>
					</div>
				</div>
				<div v-if="entryData.level==3" class="row">
					<div class="col-md-2 pt-1">Parent</div>
					<div class="col mb-2">
					<vueselect v-model="entryData.parent_id"
							:options="parents"
							:reduce="item => item.id"
							label="nama"
							code="id"
						/>
						<span class="text-danger" v-if="entryDataErr.alamat">{{entryDataErr.parent_id}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 pt-1">Kode</div>
					<div class="col mb-2">
						<input v-model="entryData.kode" class="form-control w-25">
						<span class="text-danger" v-if="entryDataErr.kode">{{entryDataErr.kode}}</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 pt-1">Nama</div>
					<div class="col mb-2">
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

<div id="confirmDelModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Konfirmasi Hapus Data</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb-1">Proses akan menghapus data dengan informasi sebagai berikut:</div>
				<div class="row">
					<div class="col-md-2 ps-4">Kode</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.kode}}</div>
				</div>
				<div class="row">
					<div class="col-md-2 ps-4">Nama</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.nama}}</div>
				</div>
				<div class="mt-4">Lanjutkan Proses?</div>
			</div>
			<div class="modal-footer">
				<button @click="submitDel" class="btn bg-danger"><i class="bi bi-check-lg"></i> Iya, Hapus Data</button>
				<button class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-lg"></i> Tutup</button>
			</div>
		</div>
	</div>
</div>
