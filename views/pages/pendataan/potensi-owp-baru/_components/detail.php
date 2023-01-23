<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/dto/potensi-op/detail.js?v=20221228a');
$this->registerJsFile('@web/js/services/potensi-op/detail.js?v=20221228a');

?>
<div class="card mb-4">
	<div class="card-header fw-600">
		Data Registrasi
	</div>
	<div class="card-body">
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Assesment</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input class="form-control" :value="data.assessment" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 text-md-end pe-md-2">Golongan</div>
			<div class="xc-md-5 xc-lg-3 mb-2">
				<input class="form-control" :value="data.golongan == 1 ? 'Pribadi' : 'Perusahaan'" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-lg-2">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input :value="data.npwp" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<input class="form-control" :value="data.rekening_id" disabled />
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.tanggalMulaiUsaha" class="form-control" disabled /></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.luasBangunan" class="form-control" disabled /></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-xl-2 text-xl-end">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.jamBukaUsaha" class="form-control" disabled /></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.jamTutupUsaha" class="form-control" disabled /></div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.pengunjung" class="form-control" disabled /></div>
			<div class="xc-md-4 xc-lg-3 pe-md-2 text-md-end">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.omsetOp" class="form-control" disabled /></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-2 pe-xl-2 text-xl-end">Genset</div>
			<div class="xc-md-4 xc-lg-3 pt-2 mb-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" :value="data.genset" v-bind:value="true" class="form-check-input" id="gensetYa">
						<label class="form-check-label" for="gensetYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" :value="data.genset" v-bind:value="false" class="form-check-input" id="gensetTidak">
						<label class="form-check-label" for="gensetTidak">Tidak</label>
					</div>
				</div>
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2 text-md-end pe-md-2">Air Tanah</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-2">
				<div>
					<div class="form-check form-check-inline">
						<input type="radio" :value="data.airTanah" v-bind:value="true" class="form-check-input" id="airYa">
						<label class="form-check-label" for="airYa">Ya</label>
					</div>
					<div class="form-check form-check-inline">
						<input type="radio" :value="data.airTanah" v-bind:value="false" class="form-check-input" id="airTidak">
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
			<div class="col-md-2 col-xl-1 pt-1">Nama</div>
			<div class="col-md col-lg-4 mb-2">
				<input :value="data.detailPotensiOp ? data.detailPotensiOp.nama : '-'" class="form-control" disabled />
			</div>
			<div class="col-md-2 pt-1 text-md-end pe-lg-2">NOP</div>
			<div class="col-md col-xl-3 mb-2">
				<input :value="data.detailPotensiOp.nop" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat</div>
			<div class="col-md-7 col-lg-5  mb-2">
				<input :value="data.detailPotensiOp.alamat" class="form-control" disabled />
			</div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-md-end pe-lg-2">RT/RW</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input :value="data.detailPotensiOp.rtRw" maxlength="5" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan</div>
			<div class="col-md mb-2">
				<input class="form-control" :value="data.detailPotensiOp.kecamatan ? data.detailPotensiOp.kecamatan.nama : '-'" disabled />
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-md-end pe-lg-2">Kelurahan</div>
			<div class="col-md mb-2">
				<input class="form-control" :value="data.detailPotensiOp.kelurahan ? data.detailPotensiOp.kelurahan.nama : '-'" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input :value="data.detailPotensiOp.telp" class="form-control" disabled />
			</div>
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
				<tr v-if="!data.detailPajaks || data.detailPajaks.length==0"><td class="text-center p-3" colspan="6">tidak ada data</td></tr>
				<tr v-for="(item, idx) in data.detailPajaks" class="fit-form-control">
					<td><input class="form-control" :value="item.klasifikasi" disabled /></td>
					<td><input class="form-control" :value="item.jumlahOp" disabled /></td>
					<td><input class="form-control" :value="item.unitOp" disabled /></td>
					<td><input class="form-control" :value="item.tarifOp" disabled /></td>
					<td><input class="form-control" :value="item.notes" disabled /></td>
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
		<div v-if="data.golongan==2" class="h6">Perusahaan</div>
		<table class="table table-bordered mb-2">
			<thead>
				<tr>
					<th>Nama</th>
					<th v-if="data.golongan!=2">NIK</th><th v-else>NIB</th>
					<th>Alamat</th>
					<th style="width:250px">Kota / Kabupaten</th>
					<th style="min-width:175px">Kelurahan</th>
					<th>No Telp</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiPemilikWp.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiPemilikWp" class="fit-form-control">
					<td>
						<input class="form-control" :value="item.nama" disabled />
					</td>
					<td>
						<input class="form-control" :value="item.nik" disabled />
					</td>
					<td>
						<input class="form-control" :value="item.alamat" disabled />
					</td>
					<td>
						<input class="form-control" :value="item.daerah ? item.daerah.nama : '-'" disabled />
					</td>
					<td>
						<input class="form-control" :value="item.kelurahan ? item.kelurahan.nama : '-'" disabled />
					</td>
					<td>
						<input class="form-control" :value="item.telp" disabled />
					</td>
				</tr>
			</tbody>
		</table>
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
					<tr v-else v-for="(item, idx) in data.potensiPemilikWp" class="fit-form-control">
						<td><input class="form-control" :value="item.direktur_nama" ></td>
						<td><input class="form-control" :value="item.direktur_nik" ></td>
						<td><input class="form-control" :value="item.direktur_alamat" ></td>
						<td>
							<input class="form-control" :value="item.direktur_daerah_id">
						</td>
						<td>
							<input class="form-control" :value="item.direktur_kelurahan_id">
						</td>
						<td><input class="form-control" :value="item.direktur_telp" ></td>
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
				</tr>
			</thead>
			<tbody>
				<tr v-if="!data.potensiNarahubungs || data.potensiNarahubungs.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
				<tr v-for="(item, idx) in data.potensiNarahubungs" class="fit-form-control">
					<td>
						<input :value="item.nama" class="form-control" >
					</td>
					<td>
						<input :value="item.nik" class="form-control" >
					</td>
					<td>
						<input :value="item.alamat" class="form-control" >
					</td>
					<td>
						<input :value="item.daerah ? item.daerah.nama : '-'" class="form-control" disabled />
					</td>
					<td>
						<input :value="item.kelurahan ? item.kelurahan.nama : '-'" class="form-control" disabled />
					</td>
 					<td>
						<input :value="item.telp" class="form-control" disabled />
					</td>
					<td>
						<input :value="item.email" class="form-control" disabled />
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header fw-600">Upload Dokumen</div>
	<div class="p-3">
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-lg-1">Foto Objek Pajak</div>
			<div class="col-md-6 col-lg mb-1">
				<div class="row g-2">
					<div v-if="data.fotoObjek" v-for="(item, idx) in data.fotoObjek" class="col-md-6 col-lg-4 mb-1">
						<a :href="'/resources/img/' + item.replace('.', '___')"><img :src="'/resources/img/' + item.replace('.', '___')" class="img-thumbnail" /></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-1">Foto KTP WP / Wakil*</div>
			<div class="col-md-7 col-xl-6 col-xxl-5 mb-1">
				<a v-if="data.fotoKtp" :href="'/resources/img/' + data.fotoKtp.replace('.', '___')"><img v-if="data.fotoKtp" :src="'/resources/img/' + data.fotoKtp.replace('.', '___')" class="img-thumbnail" /></a>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-lg-1">Form BAPL</div>
			<div class="col-md-7 col-xl-6 col-xxl-5 mb-1">
				<a v-if="data.formBapl" :href="'/resources/pdf/' + data.formBapl" >Lampiran BAPL</a>
			</div>
		</div>
		<div class="row g-1 mb-3">
			<div class="col-md-2 pt-1">Lain-lain</div>
			<div class="col-md-6 col-lg mb-1">
				<div class="row g-2">
					<div v-if="data.dokumenLainnya" v-for="(item, idx) in data.dokumenLainnya" class="col-md-6 col-lg-4 mb-1">
						<a :href="'/resources/pdf/' + item" class="btn btn-outline-primary me-2">Dokumen Lainnya{{idx + 1}}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="card mb-3">
	<div class="card-header fw-600">Peninjauan</div>
	<div class="card-body">
		<div class="row mb-3">
			<div class="xc-sm-4 xc-md-3 xc-lg-2 mb-md-2 pt-1">Tanggal</div>
			<div class="xc-sm-6 xc-md-4 xc-xl-3 mb-2">
				<input :value="bapl.tanggalPeninjauan ? bapl.tanggalPeninjauan.substr(0,10) : ''" class="form-control" disabled />
			</div>
			<div class="xc-sm-3 xc-md-2 xc-xl-1 mb-md-2 pt-1 text-lg-end">Jam</div>
			<div class="xc-sm-4 xc-md-3 xc-lg-2">
				<div class="row g-0">
					<div class="col">
						<input :value="bapl.tanggalPeninjauan ? bapl.tanggalPeninjauan.substr(11,2) : ''" class="form-control" disabled />
					</div>
					<div class="col-1 pt-1 text-center">:</div>
					<div class="col">
						<input :value="bapl.tanggalPeninjauan ? bapl.tanggalPeninjauan.substr(14,2) : ''" class="form-control" disabled />
					</div>
				</div>
			</div>
			<div class="d-none d-md-inline-block col-md-4 d-lg-none"></div>
			<div class="xc-sm-4 xc-md-3 xc-xl-2 mb-md-2 pt-1 text-lg-end">Koordinator</div>
			<div class="xc-sm-16 xc-md-10 xc-lg-7 xc-xl-5 mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="fw-600">
			Petugas
		</div>
		<table class="table table-bordered fit-form-control">
			<thead>
				<th class="text-center" style="width:50px">#</th>
				<th style="width:40%">Nama</th>
				<th>NIP</th>
				<th>Jabatan</th>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in bapl.petugas_pegawai">
					<td class="text-center pt-1">{{idx +1}}</td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= $id ?>" />