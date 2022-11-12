<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('https://cdn.jsdelivr.net/npm/lodash.debounce@4.0.8/index.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/sptpd/create.js?v=20221028a');
$this->registerJsFile('@web/js/services/sptpd/create.js?v=20221028a');

?>
<div class="card mb-4">
	<div class="card-header">Data SPTPD Hotel</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1">NPWPD</div>
			<div class="col-8 col-md-3 col-lg-2 col-xl-3 col-xxl-2">
				<input v-model="npwpd" class="form-control" disabled />
			</div>
			<div class="col"><button @click="showNpwpSearch" class="btn bg-blue"><i class="bi bi-search"></i> Cari NPWPD</button></div>
		</div>
		<div class="row g-1 mb-2">
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1">Jenis Usaha</div>
			<div class="col-md-2 col-lg-2 xc-xl-2">
				<input v-model="kodeRekening" class="form-control" disabled />
			</div>
			<div class="col-md col-lg-6 col-xxl-5">
				<input v-model="jenisUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1">Nama</div>
			<div class="col-md-6 col-lg-6 col-xxl-5">
				<input v-model="namaUsaha"t class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1">Alamat</div>
			<div class="col-md">
				<input v-model="alamatUsaha" class="form-control" disabled />
			</div>
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1 text-end pe-2">RT/RW</div>
			<div class="col-md-2 col-lg-2">
				<input v-model="rtRwUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="col-md-2 col-lg-2 xc-xl-2 pt-1">Kelurahan</div>
			<div class="col-md-6 col-lg-6 col-xxl-5">
				<input v-model="kelurahanUsaha" class="form-control" disabled />
			</div>
		</div>
	</div>
</div>

<div id="npwpdSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih NPWPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<tr>
							<th>NPWPD</th>
							<th>Nama</th>
							<th>Jenis Usaha</th>
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="npwpdList.length==0">
							<td colspan="3" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="item in npwpdList">
							<td>{{item.npwpd}}</td>
							<td>{{item.objekPajak.nama}}</td>
							<td>{{item.rekening.jenisUsaha + ' - ' + item.rekening.nama }}</td>
							<td class="text-end">
								<button @click="pilihNpwpd(item.npwpd)" class="btn bg-blue">Pilih</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
