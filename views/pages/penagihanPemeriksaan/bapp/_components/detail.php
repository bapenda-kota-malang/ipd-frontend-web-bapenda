<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221117a');
$this->registerJsFile('@web/js/dto/bapp/detail.js?v=20221108b');
$this->registerJsFile('@web/js/services/bapp/detail.js?v=20221108b');

?>
<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">No. Undangan</div>
			<div class="col-md-5 col-lg-4 col-xl-3">
				<div class="input-group mb-2">
					<input :value="data.undanganPemeriksaan.noSuratUndangan" class="form-control" disabled>
				</div>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="data.undanganPemeriksaan.npwpd.npwpd" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="data.undanganPemeriksaan.npwpd.objekPajak.nama" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 xc-xl-9 xc-xxl-8 mb-2">
				<input :value="data.undanganPemeriksaan.npwpd.objekPajak.alamat" class="form-control" disabled>
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="data.undanganPemeriksaan.npwpd.objekPajak.rtRw" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tanggal</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="data.tanggal" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Hasil</div>
			<div class="xc-md">
				<textarea v-model="data.hasil" cols="30" rows="10" class="form-control" readonly></textarea>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4" style="">
	<div class="card-header fw-600">Lampiran</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Dokumentasi</div>
			<div class="col-md-8 col-lg-7 col-xl-6 mb-2">
				<div v-if="data.dokumentasi.length==0" class="mb-2 pt-2">Belum ada foto</div>
				<a v-else v-for="(item, idx) in data.dokumentasi" :href="'/static/img/' + item" class="btn btn-outline-primary me-2">
					File {{idx + 1}}
				</a>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Dokumen Lain`</div>
			<div class="col-md-8 col-lg-7 col-xl-6 mb-2">
				<div v-if="data.dokumenLainLain.length==0" class="mb-2 pt-2">Belum ada foto</div>
				<a v-else v-for="(item, idx) in data.dokumenLainLain" :href="'/static/img/' + item" class="btn btn-outline-primary me-2">
					File {{idx + 1}}
				</a>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">Petugas</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
                    <th style="width:50px"></th>
					<th style="width:120px">NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                </tr>
			</thead>
			<tbody>
				<tr v-if="data.baPenagihanPetugas.length==0">
					<td class="text-center p-3" colspan="4">Tidak ada data</td>
				</tr>
				<tr v-else v-for="(item,idx) in data.baPenagihanPetugas">
                    <td class="pt-2 text-center"><input type="checkbox"></td>
                    <td>{{item.petugas.nip}}</td>
                    <td>{{item.petugas.nama}}</td>
                    <td>{{item.petugas.jabatan}}</td>
                </tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
