<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/dto/potensi-op/detail.js?v=20221124a');
$this->registerJsFile('@web/js/services/potensi-op/detail.js?v=20221124a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Assesment</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input class="form-control" disabled v-model="data.assessment">
			</div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 text-md-end pe-md-2">Golongan *</div>
			<div class="xc-md-5 xc-lg-3 mb-2">
				<input class="form-control" disabled v-model="data.golongan">
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-lg-2">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input v-model="data.npwp" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha *</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<input class="form-control" disabled v-model="data.rekening_id">
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.tanggalMulaiUsaha" class="form-control" disabled /></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.luasBangunan" class="form-control" disabled></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-xl-2 text-xl-end">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamBukaUsaha" class="form-control" disabled></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.jamTutupUsaha" class="form-control" disabled></div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.pengunjung" class="form-control" disabled></div>
			<div class="xc-md-4 xc-lg-3 pe-md-2 text-md-end">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input v-model="data.omsetOp" class="form-control" disabled></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-2 pe-xl-2 text-xl-end">Genset *</div>
			<div class="xc-md-4 xc-lg-3 pt-2 mb-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.genset" v-bind:value="true" class="form-check-input" id="gensetYa">
						<label class="form-check-label" for="gensetYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.genset" v-bind:value="false" class="form-check-input" id="gensetTidak">
						<label class="form-check-label" for="gensetTidak">Tidak</label>
					</div>
				</div>
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2 text-md-end pe-md-2">Air Tanah *</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.airTanah" v-bind:value="true" class="form-check-input" id="airYa">
						<label class="form-check-label" for="airYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" v-model="data.airTanah" v-bind:value="false" class="form-check-input" id="airTidak">
						<label class="form-check-label" for="airTidak">Tidak</label>
					</div>
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
			<div class="col-md-2 col-xl-1 pt-1">Nama *</div>
			<div class="col-md col-lg-4 mb-2">
				<input v-model="data.detailPotensiOp.nama" class="form-control" disabled>
			</div>
			<div class="col-md-2 pt-1 text-md-end pe-lg-2">NOP</div>
			<div class="col-md col-xl-3 mb-2">
				<input v-model="data.detailPotensiOp.nop" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat *</div>
			<div class="col-md-7 col-lg-5  mb-2">
				<input v-model="data.detailPotensiOp.alamat" class="form-control" disabled>
			</div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-md-end pe-lg-2">RT/RW *</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input v-model="data.detailPotensiOp.rtRw" maxlength="5" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan *</div>
			<div class="col-md mb-2">
				<input class="form-control" disabled v-model="data.detailPotensiOp.kecamatan.nama">
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-md-end pe-lg-2">Kelurahan *</div>
			<div class="col-md mb-2">
				<input class="form-control" disabled v-model="data.detailPotensiOp.kelurahan.nama">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input v-model="data.detailPotensiOp.telp" class="form-control" disabled>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Pemilik
	</div>
	<div class="card-body">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="autoPemilik">
			<label class="form-check-label" for="autoPemilik">
				Data pemilik sama dengan data object pajak
			</label>
		</div>
		<div v-if="data.golongan==2" class="h6">Perusahaan</div>
		<table class="table table-bordered mb-2">
			<thead>
				<tr>
					<th>Nama *</th>
					<th v-if="data.golongan!=2">NIK</th><th v-else>NIB</th>
					<th>Alamat *</th>
					<th style="width:250px">Kota / Kabupaten *</th>
					<th style="min-width:175px">Kelurahan *</th>
					<th>No Telp *</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiPemilikWp.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiPemilikWp" class="fit-form-control">
					<td>
						<input class="form-control" disabled v-model="item.nama" >
					</td>
					<td>
						<input class="form-control" disabled v-model="item.nik" >
					</td>
					<td>
						<input class="form-control" disabled v-model="item.alamat" >
					</td>
					<td>
						<input class="form-control" disabled v-model="item.daerah.nama">
					</td>
					<td>
						<input class="form-control" disabled v-model="item.kelurahan.nama">
					</td>
					<td>
						<input class="form-control" disabled v-model="item.telp" >
					</td>
					<td class="text-center">
						<button v-if="idx>0" @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addPemilik()" class="btn bg-blue">Tambah</button>
		<div v-if="data.golongan==2">
			<hr />
			<div class="h6">Direktur Perusahaan</div>
			<table class="table table-bordered mb-2">
				<thead>
					<tr>
						<th>Nama</th>
						<th v-if="data.golongan==2">NIK</th><th v-else>NIB</th>
						<th>Alamat</th>
						<th style="width:250px">Kota / Kabupaten</th>
						<th style="min-width:175px">Kelurahan</th>
						<th>No Telp</th>
						<th style="width:30px"></th>
					</tr>
				</thead>
				<tbody>
					<tr v-if="data.potensiPemilikWp.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
					<tr v-else v-for="(item, idx) in data.pemilik" class="fit-form-control">
						<td><input class="form-control" disabled v-model="item.direktur_nama" ></td>
						<td><input class="form-control" disabled v-model="item.direktur_nik" ></td>
						<td><input class="form-control" disabled v-model="item.direktur_alamat" ></td>
						<td>
							<input class="form-control" disabled v-model="item.direktur_daerah_id">
						</td>
						<td>
							<input class="form-control" disabled v-model="item.direktur_kelurahan_id">
						</td>
						<td><input class="form-control" disabled v-model="item.direktur_telp" ></td>
						<td class="text-center">
							<button @click="delPemilik(idx)" class="btn btn-xs bg-danger p-1">
								<i class="bi bi-x-lg"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Data Narahubung
	</div>
	<div class="card-body">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="" id="autoNarahubung">
			<label class="form-check-label" for="autoNarahubung">
				Data narahubung sama dengan data object pajak
			</label>
		</div>
		<table class="table table-bordered mb-2" disable>
			<thead>
				<tr>
					<th>Nama</th>
					<th>NIK</th>
					<th>Alamat</th>
					<th style="width:250px">Kota / Kabupaten</th>
					<th style="min-width:175px">Kelurahan</th>
					<th>No Telp</th>
					<th>Email</th>
					<th style="width:30px"></th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiNarahubung.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiNarahubung" class="fit-form-control">
					<td>
						<input v-model="item.nama" class="form-control" disabled >
					</td>
					<td>
						<input v-model="item.nik" class="form-control" disabled >
					</td>
					<td>
						<input v-model="item.alamat" class="form-control" disabled >
					</td>
					<td>
						<input v-model="item.daerah.nama" class="form-control" disabled>
					</td>
					<td>
						<input v-model="item.kelurahan.nama" class="form-control" disabled>
					</td>
 					<td>
						<input v-model="item.telp" class="form-control" disabled>
					</td>
					<td>
						<input v-model="item.email" class="form-control" disabled>
					</td>
					<td class="text-center">
						<button v-if="idx>0" @click="delNarahubung(idx)" class="btn btn-xs bg-danger p-1">
							<i class="bi bi-x-lg"></i>
						</button>
					</td>
				</tr>
			</tbody>
		</table>
		<button @click="addNarahubung(this)" class="btn bg-blue">Tambah</button>
	</div>
</div>

<input type="hidden" id="id" value="<?= $id ?>" />