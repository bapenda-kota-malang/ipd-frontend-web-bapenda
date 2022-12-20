<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221201a');
$this->registerJsFile('@web/js/dto/und-pemeriksaan/create.js?v=20221201a');
$this->registerJsFile('@web/js/services/und-pemeriksaan/entry.js?v=20221201a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Jenis Pajak</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<select v-model="data.jenisPajak" class="form-control">
					<option value="1">PDL</option>
					<option value="2">PBB</option>
				</select>
				<span class="text-danger" v-if="dataErr['jenisPajak']">{{dataErr['jenisPajak']}}</span>
			</div>
			<div class="d-none d-md-inline-block xc-md-10 xc-lg-4 xc-xl-3 m-0"></div>
			<div class="xc-md-3 pt-1 text-lg-end pe-2">Nomor Surat</div>
			<div class="xc-md-7 xc-lg-5 xc-xl-4 xc-xxl-4">
				<div class="input-group mb-2">
					<span class="input-group-text px-1">{{nomorPrefix}}</span>
					<input v-model="nomorMidfix" class="form-control" style="width:50px!important">
					<span class="input-group-text px-1">{{nomorPostfix}}</span>
				</div>
				<span class="text-danger" v-if="dataErr['noSuratUndangan']">{{dataErr['noSuratUndangan']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">{{data.jenisPajak == 1 ? 'NPWPD' : 'NOP'}}</div>
			<div class="xc-md-7 xc-lg-6 xc-xl-5">
				<div class="input-group mb-2">
					<input v-model="refNo" class="form-control">
					<span @click="searchRef" class="input-group-text px-3 pointer"><i class="bi bi-search me-2"></i>Cari</span>
				</div>
				<span class="text-danger" v-if="dataErr['npwpd_id']">{{dataErr['npwpd_id']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Tanggal / Jam</div>
			<div class="xc-md-6 xc-lg-5 xc-xl-4 xc-xxl-3 mb-2">
				<div class="row g-1">
					<div class="col-7">
						<datepicker v-model="tanggalView" format="DD/MM/YYYY" />						
					</div>
					<div class="col">
						<input v-model="data.pukul" class="form-control">
					</div>
				</div>
				<span class="text-danger" v-if="dataErr['tanggal'] || dataErr['pukul']">{{dataErr['tanggal'] || dataErr['pukul']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Tempat</div>
			<div class="xc-md mb-2">
				<textarea v-model="data.tempat" rows="3" class="form-control"></textarea>
				<span class="text-danger" v-if="dataErr['tempat']">{{dataErr['tempat']}}</span>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Keperluan</div>
			<div class="xc-md">
				<textarea v-model="data.keperluan" rows="5" class="form-control"></textarea>
				<span class="text-danger" v-if="dataErr['keperluan']">{{dataErr['keperluan']}}</span>
			</div>
		</div>
	</div>
</div>


<div id="searchRefBox" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih Surat</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table">
					<thead>
						<template v-if="data.jenisPajak == 1">
							<tr>
								<th>NPWPD</th>
								<th>Nama</th>
								<th>Jenis Usaha</th>
								<th style="width:100px"></th>
							</tr>
						</template>
						<template v-else>
							<tr>
								<th>NOP</th>
								<th>Nama</th>
								<th>Jenis Usaha</th>
								<th style="width:100px"></th>
							</tr>
						</template>
					</thead>
					<tbody>
						<template v-if="data.jenisPajak == 1">
							<tr v-if="refList.length==0">
								<td colspan="4" class="text-center">Data masih kosong</td>
							</tr>
							<tr v-for="(item,idx) in refList">
								<td>{{item.npwpd}}</td>
								<td>{{item.objekPajak.nama}}</td>
								<td>{{item.rekening.jenisUsaha + ' - ' + item.rekening.nama }}</td>
								<td class="text-end">
									<button @click="pilihRef(idx)" class="btn bg-blue">Pilih</button>
								</td>
							</tr>
						</template>
						<template v-else>
							<tr v-if="refList.length==0">
								<td colspan="3" class="text-center">Data masih kosong</td>
							</tr>
							<tr v-for="item in refList">
								<td>{{item.npwpd}}</td>
								<td>{{item.objekPajak.nama}}</td>
								<td>{{item.rekening.jenisUsaha + ' - ' + item.rekening.nama }}</td>
								<td class="text-end">
									<button @click="pilihRef(idx)" class="btn bg-blue">Pilih</button>
								</td>
							</tr>
						</template>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
