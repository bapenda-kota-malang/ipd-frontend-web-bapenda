<?php

use yii\web\View;

?>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6">Assesment</div>
					<div class="col mb-2">{{data.jenisPajak}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-5 text-lg-end">Golongan</div>
					<div class="col mb-2">{{data.golongan}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-4 text-xl-end">NPWP</div>
					<div class="col mb-2">{{data.npwp}}</div>
				</div>
			</div>
		</div>
		<div class="row g-xl-0">
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4">NPWPD</div>
					<div class="col mb-2 ps-xl-3">{{data.npwpd}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 text-lg-end">Tgl NPWPD</div>
					<div class="col mb-2 ps-xl-3 date">{{data.tanggalNpwpd}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 text-xl-end">Tgl Pengukuhan</div>
					<div class="col mb-2 ps-xl-3">{{data.tanggalPengukuhan}}</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-6">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-2 col-xl-3">Jenis Usaha</div>
					<div class="col-md col-lg-7 col-xl mb-2 ps-xl-2">{{data.rekening_id}}</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6 col-xl-3">
				<div class="row">
					<div class="col-md-3 col-lg-4 col-xl-6">Mulai Usaha</div>
					<div class="col mb-2 pl-0">{{data.tanggalMulaiUsaha}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-lg-0">
					<div class="col-md-3 col-lg-4 col-xl-6 text-lg-end">Luas Bangunan</div>
					<div class="col ps-lg-2 mb-2">{{data.luasBangunan}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 text-lg-end">Jam Buka Usaha</div>
					<div class="col ps-xl-2 mb-2">{{data.jamBukaUsaha}}
						
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 text-xl-end">Jam Tutup Usaha</div>
					<div class="col ps-xl-2 mb-2">{{data.jamTutupUsaha}}
						
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6" style="line-height:1em">Jml. Pengunjung<br/><small>(Rata-rata)</small></div>
					<div class="col ps-xl-2 mb-2">{{data.pengunjung}}</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xl-6 pt-xxl-1 text-xl-end">Potensi Omset<br/><small>(Perbulan)</small></div>
					<div class="col ps-lg-2 mb-2">{{data.omsetOp}}</div>
				</div>
			</div>
		</div>
		<div class="row mb-2">
			<div class="col-lg-6 col-xl-4 col-xxl-3">
				<div class="row g-xl-0">
					<div class="col-md-3 col-lg-4 col-xxl-6 pt-xxl-0">Genset</div>
					<div class="col ps-xl-4 ps-xxl-3"><span v-if="data.genset">Ya</span><span v-else>Ya</span></div>
				</div>
			</div>
			<div class="col-lg col-xl-4">
				<div class="row g-0">
					<div class="col-md-3 col-lg-4 col-xl-3 col-xxl-6 text-lg-end">Air Tanah</div>
					<div class="col ps-lg-3"><span v-if="data.airTanah">Ya</span><span v-else>Ya</span></div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Objek Pajak
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md-2 col-xl-1">Nama</div>
			<div class="col-md col-lg-5 mb-2">{{data.objekPajak.nama}}</div>
			<div class="col-md-2 col-xl-1 text-lg-end pe-lg-2">NOP</div>
			<div class="col-md mb-2">{{data.objekPajak.nop}}</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1">Alamat</div>
			<div class="col-md-7 col-lg-5  mb-2">{{data.objekPajak.alamat}}</div>
			<div class="col-md-2 col-xl-1 col-lg-1 text-lg-end pe-lg-2">RT/RW</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">{{data.objekPajak.rtRw}}</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1">Kecamatan</div>
			<div class="col-md mb-2">{{data.objekPajak.kecamatan_id}}</div>
			<div class="col-md-2 col-xl-1 text-lg-end pe-lg-2">Kelurahan</div>
			<div class="col-md mb-2">{{data.objekPajak.kelurahan_id}}</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">{{data.objekPajak.telp}}</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Detail Objek Pajak
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Klasifikasi</th>
					<th>Jumlah</th>
					<th>Unit</th>
					<th>Tarif</th>
					<th>Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in detail_op" class="fit-form-control">
					<td>{{item.jenisOp}}</td>
					<td>{{item.jumlahOp}}</td>
					<td>{{item.unitOp}}</td>
					<td>{{item.tarifOp}}</td>
					<td>{{item.notes}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pemilik
	</div>
	<div class="card-body">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in pemilik" class="fit-form-control">
					<td>{{item.nama}}</td>
					<td>{{item.nik}}</td>
					<td>{{item.alamat}}</td>
					<td>{{item.kota_id}}</td>
					<td>{{item.kecamatan_id}}</td>
					<td>{{item.kelurahan_id}}</td>
					<td>{{item.telp}}</td>
					<!-- <td><input class="form-control" v-model="item.status" ></td> -->
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Narahubung
	</div>
	<div class="card-body">
		<table class="table table-bordered" disable>
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th>Kota</th>
					<th>Kecamatan</th>
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in narahubung" class="fit-form-control">
					<td>{{item.nama}}</td>
					<td>{{item.nik}}</td>
					<td>{{item.alamat}}</td>
					<td>{{item.kota_id}}</td>
					<td>{{item.kecamatan_id}}</td>
					<td>{{item.kelurahan_id}}</td>
 					<td>{{item.telp}}</td>
					<!-- <td><input class="form-control" v-model="item.status" ></td> -->
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php
$this->registerJsFile('@web/js/refs/common.js');
$this->registerJsFile('@web/js/dto/pendaftaran-wp/entryform.js');
$this->registerJsFile('@web/js/services/pendaftaran-wp/detail.js');
$this->registerJsFile('@web/js/app-detail.js');
