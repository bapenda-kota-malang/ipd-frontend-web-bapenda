<?php

use yii\web\View;

?>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Assesment</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.jenisPajak}}</div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Golongan</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{golongans[data.golongan]}}</div>
			<div class="xc-md-4 xc-xl-2 field-label">NPWP</div>
			<div class="xc-md-4 xc-xl-4 mb-2">{{data.npwp}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">NPWPD</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.npwpd}}</div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Tgl NPWPD</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.tanggalNpwpd}}</div>
			<div class="xc-md-4 xc-xl-2 field-label">Tgl Pengukuhan</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.tanggalPengukuhan}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Jenis Usaha</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.rekening.jenisUsaha}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Mulai Usaha</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.tanggalMulaiUsaha}}</div>
			<div class="xc-md-4 xc-xl-2 field-label">Luas Bangunan</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.luasBangunan}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Jam Buka Usaha</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.jamBukaUsaha}}</div>
			<div class="xc-md-4 xc-xl-2 field-label">Jam Tutup Usaha</div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.jamTutupUsaha}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.pengunjung}}</div>
			<div class="xc-md-4 xc-xl-2 field-label">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-3 xc-xl-4 mb-2">{{data.omsetOp}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Genset</div>
			<div class="xc-md-3 xc-xl-4 mb-2"><span v-if="data.genset">Ya</span><span v-else>Ya</span></div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Air Tanah</div>
			<div class="xc-md-3 xc-xl-4 mb-2"><span v-if="data.airTanah">Ya</span><span v-else>Ya</span></div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Objek Pajak
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Nama</div>
			<div class="xc-md-8 xc-xl-5 mb-2">{{data.objekPajak.nama}}</div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">NOP</div>
			<div class="xc-md-5 xc-xl-3 mb-2">{{data.objekPajak.nop}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Alamat</div>
			<div class="xc-md-8 xc-xl-5 mb-2">{{data.objekPajak.alamat}}</div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">RT/RW</div>
			<div class="xc-md-5 xc-xl-3 mb-2">{{data.objekPajak.rtRw}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Kecamatan</div>
			<div class="xc-md-8 xc-xl-5 mb-2">{{data.objekPajak.kecamatan_id}}</div>
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Kelurahan</div>
			<div class="xc-md-5 xc-xl-3 mb-2">{{data.objekPajak.kelurahan_id}}</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-3 xc-xl-2 mb-md-2 field-label">Telpon</div>
			<div class="xc-md-8 xc-xl-5 mb-2">{{data.objekPajak.telp}}</div>
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
				<tr v-for="(item, index) in data.detailObjekPajak">
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
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in data.pemilik">
					<td>{{item.nama}}</td>
					<td>{{item.nik}}</td>
					<td>{{item.alamat}}</td>
					<td v-if="item.daerah">{{item.daerah.nama}}</td>
					<td v-else>{{item.daerah_id}}</td>
					<td v-if="item.kelurahan">{{item.kelurahan.nama}}</td>
					<td v-else>{{item.kelurahan_id}}</td>
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
					<th>Kelurahan</th>
					<th>No Telp</th>
					<!-- <th>Status</th> -->
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in data.narahubung">
					<td>{{item.nama}}</td>
					<td>{{item.nik}}</td>
					<td>{{item.alamat}}</td>
					<td v-if="item.daerah">{{item.daerah.nama}}</td>
					<td v-else>{{item.daerah_id}}</td>
					<td v-if="item.kelurahan">{{item.kelurahan.nama}}</td>
					<td v-else>{{item.kelurahan_id}}</td>
 					<td>{{item.telp}}</td>
					<!-- <td><input class="form-control" v-model="item.status" ></td> -->
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />

<?php
$this->registerJsFile('@web/js/refs/common.js?v=20221108ab');
$this->registerJsFile('@web/js/dto/npwpd/detail.js?v=20221108b');
$this->registerJsFile('@web/js/services/pendaftaran-wp/detail.js?v=20221108b');
$this->registerJsFile('@web/js/app-detail.js?v=20221108a');
