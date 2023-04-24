<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/sspd/create.js?v=20221124a');
$this->registerJsFile('@web/js/services/sspd/entry.js?v=20221124a');

?>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">Tanggal</div>
	<div class="col-md-3 xc-lg-3 mb-2">
		<datepicker v-model="data.tanggalBayar" format="DD/MM/YYYY" />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">Jenis Pajak</div>
	<div class="col-2 col-md-3 xc-lg-3 mb-2">
		<select class="form-select">
			<option>-- Pilih --</option>
		</select>
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">Unggah file (Xlsx)</div>
	<div class="col-md-3 mb-2">
		<input class="form-control" type="file" @change="storeFileToField($event, data.spt, 'lampiran', 'application/pdf')">
		<!-- <span class="text-danger" v-if="dataErr['spt.lampiran']">{{dataErr['spt.lampiran']}}</span> -->
	</div>
</div>
<div class="row g-1 mt-2 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1"></div>
	<div class="col-md-6 xc-lg-8 col-xxl-5">
		<button @click="submitData" class="btn bg-blue">
			<i class="bi bi-check-lg"></i> Sinkronkan
		</button>
	</div>
</div>

<div class="row g-1 mb-2 mt-3">
	<!-- <div class="xc-md-4 xc-lg-3 pt-1">Detail Pembayaran</div> -->
	<div class="col-md">
		<table class="table">
			<thead>
				<tr>
					<td class="bg-slate-300">No</td>
					<td class="bg-slate-300">SPTPD/SKPD/SKPDKB</td>
					<td class="bg-slate-300">No SSPD</td>
					<td class="bg-slate-300">Tanggal SSPD</td>
					<td class="bg-slate-300">Nominal</td>
					<td class="bg-slate-300">Nominal Denda</td>
					<td class="bg-slate-300">Kode Bayar / VA</td>
					<td class="bg-slate-300">Nominal</td>
					<td class="bg-slate-300">Nominal Denda</td>
					<td class="bg-slate-300">Sinkron</td>
					<td class="bg-slate-300">Hapus SSPD</td>
					<td class="bg-slate-300">Keterangan</td>
				</tr>
			</thead>
			<tbody>
				<!-- <tr v-if="!sptpdDetail">
					<td colspan="12" class="text-center p-3">tidak ada data</td>
				</tr>
				<tr v-else> -->
				<tr>
					<td class="">1</td>
					<td class="">A1234567</td>
					<td class="">A1234</td>
					<td class="">DD-MM-YYYY</td>
					<td class="">Rp. 390.000</td>
					<td class="">Rp. 390.000</td>
					<td class="">123456789098765</td>
					<td class="">Rp. 390.000</td>
					<td class="">Rp. 390.000</td>
					<td style="width:50px"><input class="form-check-input" type="checkbox" value=""></td>
					<td style="width:50px"><input class="form-check-input" type="checkbox" value=""></td>
					<td class=""></td>
				</tr>
			</tbody>
		</table>
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
							<td class="bg-slate-300">NPWPD</td>
							<td class="bg-slate-300">Nama</td>
							<td class="bg-slate-300">Jenis Usaha</td>
							<td class="bg-slate-300" style="width:100px"></td>
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