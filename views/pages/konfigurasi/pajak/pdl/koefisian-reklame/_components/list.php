<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/koefisian-reklame/koefisian-reklame.js?v=20221108a');
$this->registerJsFile('@web/js/services/koefisian-reklame/koefisian-reklame.js?v=20221108a');

?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" @click="setTabOne()" id="mpt1t-tab" data-bs-toggle="tab" data-bs-target="#mpt1t" type="button" role="tab" aria-controls="mpt1t" aria-selected="true">Masak Pajak Tetap 1 Tahun</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabTwo()" id="mpi1t-tab" data-bs-toggle="tab" data-bs-target="#mpi1t" type="button" role="tab" aria-controls="profile" aria-selected="false">Masa Pajak Insidentil 1 Tahun</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabThree()" id="mpi1b-tab" data-bs-toggle="tab" data-bs-target="#mpi1b" type="button" role="tab" aria-controls="mpi1b" aria-selected="false">Masa Pajak Insidentil 1 Bulan</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" @click="setTabFour()" id="mpi1kp-tab" data-bs-toggle="tab" data-bs-target="#mpi1kp" type="button" role="tab" aria-controls="mpi1kp" aria-selected="false">Masa Pajak Insidentil 1 Kali Penyelenggaraan</button>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="mpt1t" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar</th>
					<th>Klasifikasi</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{item.jenisReklame}}</td>
					<td>{{item.dasarPengenaan}}</td>
					<td>{{item.klasifikasiJalan_id}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarif)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="mpi1t" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{item.jenisReklame}}</td>
					<td>{{item.dasarPengenaan}}</td>
					<td>{{item.masaPajak}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarif)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="mpi1b" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{item.jenisReklame}}</td>
					<td>{{item.dasarPengenaan}}</td>
					<td>{{item.masaPajak}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarif)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="tab-pane" id="mpi1kp" role="tabpanel">
		<table class="table custom">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Reklame</th>
					<th>Dasar Pengeluaran</th>
					<th>Masa Pajak</th>
					<th>Pajak</th>
					<th style="width:90px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data">
					<td>{{idx+1}}</td>
					<td>{{item.jenisReklame}}</td>
					<td>{{item.dasarPengenaan}}</td>
					<td>{{item.masaPajak}}</td>
					<td>{{new Intl.NumberFormat("id-ID").format(item.tarif)}}</td>
					<td>
						<div class="btn-group">
							<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
								Aksi
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" @click="showEntry(idx)">Edit</a></li>
								<li><a class="dropdown-item" @click="showDel(idx)">Hapus</a></li>
							</ul>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="entryFormModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>{{entryFormTitle}}</div>
				<button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row my-2">
					<div class="col-md-3 pt-1">Jenis Masa</div>
					<div class="col">
						<vueselect v-model="entryData.jenisMasa" :options="masaList" :reduce="item => item.no" label="masa" placeholder=".. Pilih .."></vueselect>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 pt-1">jenis Reklame</div>
					<div class="col">
					<vueselect v-model="entryData.jenisReklame" :options="reklameList" :reduce="item => item.jenisReklame" label="jenisReklame" placeholder=".. Pilih .."></vueselect>
					</div>
				</div>
				<div class="row my-2">
					<div class="col-md-3 pt-1">Dasar</div>
					<div class="col">
					<vueselect v-model="entryData.dasarPengenaan" :options="dasarList" :reduce="item => item.dasar" label="dasar" placeholder=".. Pilih .."></vueselect>
					</div>
				</div>
				<template v-if="entryData.jenisMasa === 1">
				<div class="row my-2">
					<div class="col-md-3 pt-1">Klasifikasi</div>
					<div class="col">
						<input v-model="entryData.klasifikasiJalan_id" class="form-control">
					</div>
				</div>
				</template>
				<template v-else>
				<div class="row my-2">
					<div class="col-md-3 pt-1">Masa Pajak</div>
					<div class="col">
						<input v-model="entryData.masaPajak" class="form-control">
					</div>
				</div>
				</template>
				<div class="row my-2">
					<div class="col-md-3 pt-1">Pajak</div>
					<div class="col">
						<input v-model.number="entryData.tarif" class="form-control">
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
					<div class="col-md-4 ps-4">Jenis Masa</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.jenisMasa}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">jenis Reklame</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.jenisReklame}}</div>
				</div>
				<div class="row">
					<div class="col-md-4 ps-4">Dasar</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.dasarPengenaan}}</div>
				</div>
				<template v-if="entryData.jenisMasa === 1">
				<div class="row">
					<div class="col-md-4 ps-4">Klasifikasi</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.klasifikasiJalan_id}}</div>
				</div>
				</template>
				<template v-else>
				<div class="row">
					<div class="col-md-4 ps-4">Masa Pajak</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{entryData.masaPajak}}</div>
				</div>
				</template>
				<div class="row">
					<div class="col-md-4 ps-4">Pajak</div>
					<div class="xc-1">:</div>
					<div class="col-md mb-1">{{new Intl.NumberFormat("id-ID").format(entryData.tarif)}}</div>
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