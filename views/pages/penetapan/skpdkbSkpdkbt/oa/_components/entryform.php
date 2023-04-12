<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/skpdkb-skpdkbt/oa/create.js?v=20221114a');
$this->registerJsFile('@web/js/services/skpdkb-skpdkbt/oa/create.js?v=20221117a');

?>

<!-- Penetapan -->
<div class="card mb-4">
	<div class="card-header">Penetapan</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Penetapan Berdasarkan</label>
				<select class="form-select">
					<option v-for="(item, idx) in penetapanList" :value="idx">{{item}}</option>
				</select>
				<!--
				<vueselect v-model="data.jenisKetetapan" :options="penetapanList" :reduce="item => item.jenisKetetapan" label="jenisKetetapan" code="jenisKetetapan" />
				-->
			</div>
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Billing Penetapan</label>
				<input type="text" v-model="billingNumber" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-2 col-xl-6 col-xxl-4 mb-2">
				<label for="">Jenis Pajak</label>
				<input type="text" v-model="jenisPajak" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-10 col-xl-6 col-xxl-4 mb-2">
				<label for="">&nbsp;</label>
				<input type="text" v-model="namaObjekPajak" class="form-control">
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-10 col-xl-6 col-xxl-4 mb-2">
				<label for="">SKPD/SKPDKB/SKPDKBT</label>
				<div class="input-group mb-3">
					<input type="text" v-model="nomorSpt" class="form-control">
					<button class="btn bg-blue" @click="showOaSearch">Cari</button>
				</div>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Tanggal Penetapan</label>
				<input type="text" v-model="tanggalSpt" class="form-control" disabled>
			</div>
			<div class="xc-md xc-lg-6 col-xl-6 col-xxl-4 mb-2">
				<label for="">Tanggal Batas Bayar</label>
				<input type="text" v-model="jatuhTempo" class="form-control" disabled>
			</div>
		</div>
		<div class="row mb-2">
			<div class="">
				<table class="table table-hover">
					<thead class="table-light">
						<tr class="text-capitalize">
							<th>NPWPD</th>
							<th>nama wajib pajak</th>
							<th>jumlah SKPD</th>
							<th>kenaikan</th>
							<th>bunga</th>
							<th>denda</th>
							<th>pengurang</th>
							<th>jumlah total</th>
							<th>masa awal</th>
							<th>masa akhir</th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="viewData.length==0">
							<td colspan="10" class="text-center">Tidak ada data</td>
						</tr>
						<tr v-for="item in viewData">
							<td>{{item.npwpd}}</td>
							<td>{{item.namaWajibPajak}}</td>
							<td>{{item.jumlahSKPD}}</td>
							<td>{{item.kenaikan}}</td>
							<td>{{item.bunga}}</td>
							<td>{{item.denda}}</td>
							<td>{{item.pengurang}}</td>
							<td>{{item.jumlahTotal}}</td>
							<td>{{item.masaAwal}}</td>
							<td>{{item.masaAkhir}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- Riwayat SKPD -->
<div class="card mb-4">
	<div class="card-header">Riwayat SKPD</div>
	<div class="card-body">
		<div class="row mb-2">
			<div>
				<table class="table table-hover">
					<thead class="table-light">
						<tr class="text-capitalize">
							<th>No. SPTPD/SKPDKB</th>
							<th>nominal</th>
							<th>tanggal pembayaran</th>
							<th>masa pajak</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="4" class="text-center">belum ada API untuk riwayat</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div id="oaSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
							<th>SKPD/SKPDKB/SKPDKBT</th>
							<th>NPWPD</th>
							<th>Nama Wajib Pajak</th>
							<th>Jumlah SKPD</th>
							<th>Masa Awal</th>
							<th>Masa Akhir</th>
							<th style="width:100px"></th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="searchOaList.length==0">
							<td colspan="7" class="text-center">Data masih kosong</td>
						</tr>
						<tr v-for="item in searchOaList">
							<td>{{item.NomorSpt}}</td>
							<td>{{item.npwpd.npwpd}}</td>
							<td>{{item.objekPajak.nama}}</td>
							<td>{{item.jumlahPajak}}</td>
							<td>{{item.periodeAwal}}</td>
							<td>{{item.periodeAkhir}}</td>
							<td class="text-end">
								<button @click="selectSearch(item.NomorSpt)" class="btn bg-blue">Pilih</button>
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
