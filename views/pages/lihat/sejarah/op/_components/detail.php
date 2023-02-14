<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/services/jambong/detail.js?v=20221117a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Perhitungan
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8 col-xl-6">
				<div class="row g-0">
					<div class="xc-md-6 xc-lg-5 xc-xl-5 mt-1">Nomor SKPD</div>
					<div class="xc-15 xc-md ps-2 ps-lg-1 mb-2 px-xl-3">
						<input class="form-control" />
					</div>
					<div v-if="!id" class="xc"><button @click="showSkpdSearch" class="btn bg-blue"><i class="bi bi-search"></i> Cari SKPD</button></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1">Tgl SKPD</div>
					<div class="col-md mb-2">
						<input :value="skpd_tanggal" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1 text-lg-end">Tahun</div>
					<div class="col-md mb-2">
						<input :value="skpd_tahun" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1">NPWPD</div>
					<div class="col-md mb-2">
						<input :value="wp_npwpd" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-5 xc-xl-4 mt-1 text-lg-end">Nama WP</div>
					<div class="col-md mb-2">
						<input :value="wp_nama" class="form-control w-75" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-5 xc-xl-4 mt-1">Alamat WP</div>
					<div class="col-md mb-2">
						<input  :value="wp_alamat" class="form-control" disabled />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1">Jenis Reklame</div>
					<div class="col-md mb-2">
						<input class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1 text-lg-end">Batas Pengambilan</div>
					<div class="col-md mb-2">
						<input class="form-control" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1">Nomor</div>
					<div class="col-md mb-2">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1 text-lg-end">Tanggal</div>
					<div class="col-md mb-2">
						<datepicker v-model="data.tanggal" format="DD/MM/YYYY" />
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">
				<div class="row">
					<div class="xc-md-6 xc-lg-10 xc-xl-8 mt-1">Biaya Pemutusan Listrik</div>
					<div class="col-md mb-2">
						<input class="form-control" />
					</div>
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-4 mt-1 text-lg-end">Nominal</div>
					<div class="col-md mb-2">
						<input class="form-control w-75" />
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="xc-md-6 xc-lg-5 xc-xl-4 mt-1">Dimensi Reklame</div>
					<div class="col-md mb-2 mt-1">
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
							<label class="form-check-label" for="inlineRadio1">Persegi</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
							<label class="form-check-label" for="inlineRadio2">Persegi Panjang</label>
						</div>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
							<label class="form-check-label" for="inlineRadio3">Lingkaran</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-4">
	<div class="card-header fw-600">
		Item
	</div>
	<div class="card-body">
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th>Tipe Reklame</th>
					<th style="width:60px">P</th>
					<th style="width:60px">L</th>
					<th style="width:60px">Sisi</th>
					<th style="width:60px">Diameter</th>
					<th style="width:60px">Jumlah</th>
					<th>Mulai</th>
					<th>Akhir</th>
					<th style="min-width:160px">Tarif</th>
					<th>Jambong</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data.detailJambong">
					<td><input class="form-control" disabled /></td>
					<td><input :value="detailSptReklame[idx].panjang" class="form-control" disabled /></td>
					<td><input :value="detailSptReklame[idx].lebar" class="form-control" disabled /></td>
					<td><input :value="detailSptReklame[idx].sisi" class="form-control" disabled /></td>
					<td><input :value="detailSptReklame[idx].diameter" class="form-control" disabled /></td>
					<td><input :value="detailSptReklame[idx].jumlah" class="form-control" disabled /></td>
					<td><input class="form-control" disabled /></td>
					<td><input class="form-control" disabled /></td>
					<td>
						<vueselect v-model="data.detailJambong[idx].tarifJambong_Id"
							:options="tarifJambongList"
							:reduce="item => item.id"
							label="nominal"
							code="id"
						/>
					</td>
					<td><input class="form-control" /></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="skpdSearch" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Pilih SKPD</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<table class="table custom">
					<thead>
						<tr>
							<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
							<th>No SPTPD</th>
							<th>Tanggal</th>
							<th>Masa Pajak</th>
							<th>Jatuh Tempo</th>
							<th>NPWPD</th>
							<th>Nama Wajib Pajak</th>
							<th style="width:120px"></th>
						</tr>
						<tbody>
							<tr v-if="skpdList.length==0">
								<td colspan="11" class="p-4 text-center">Tidak ada data</td>
							</tr>
							<tr v-for="item in skpdList" class="pointer">
								<td><input type="checkbox" /></td>
								<td>{{item.nomorSpt}}</td>
								<td>{{item.createdAt.substring(0,10)}}</td>
								<td>{{item.periodeAkhir.substring(0,10) + ' s/d ' + item.periodeAkhir.substring(0,10)}}</td>
								<td>{{item.jatuhTempo.substring(0,10)}}</td>
								<td>{{item.rekening.jenisUsaha}}</td>
								<td>{{item.npwpd.npwpd}}</td>
								<td>{{item.objekPajak.nama}}</td>
								<td class="text-center">
									<button @click="pilihSkpd(item.id)" class="btn bg-blue">Pilih</button>
								</td>
							</tr>
						</tbody>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>