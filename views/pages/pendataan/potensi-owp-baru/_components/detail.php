<?php

use yii\web\View;
use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

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
				<input class="form-control" disabled :value="data.assessment">
			</div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 text-md-end pe-md-2">Golongan *</div>
			<div class="xc-md-5 xc-lg-3 mb-2">
				<input class="form-control" disabled :value="data.golongan">
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-lg-2">NPWP</div>
			<div class="xc-md-5 xc-lg-3  mb-2">
				<input :value="data.npwp" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Jenis Usaha *</div>
			<div class="xc-md-16 xc-lg-12 xc-xl-10 mb-2">
				<input class="form-control" disabled :value="data.rekening_id">
			</div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-1">Mulai Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.tanggalMulaiUsaha" class="form-control" disabled /></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Luas Bangunan</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.luasBangunan" class="form-control" disabled></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-xl-2 text-xl-end">Jam Buka Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.jamBukaUsaha" class="form-control" disabled></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-1 pe-md-2 text-md-end">Jam Tutup Usaha</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.jamTutupUsaha" class="form-control" disabled></div>
		</div>
		<div class="row g-0">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2">Jumlah Pengunjung<br/><small>(Rata-rata)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.pengunjung" class="form-control" disabled></div>
			<div class="xc-md-4 xc-lg-3 pe-md-2 text-md-end">Potensi Omset<br/><small>(Perbulan)</small></div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-2"><input :value="data.omsetOp" class="form-control" disabled></div>
			<div class="d-none d-md-inline-block d-xl-none xc-lg-6"></div>
			<div class="xc-md-4 xc-lg-3 mb-md-2 pt-2 pe-xl-2 text-xl-end">Genset *</div>
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
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2 text-md-end pe-md-2">Air Tanah *</div>
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
			<div class="col-md-2 col-xl-1 pt-1">Nama *</div>
			<div class="col-md col-lg-4 mb-2">
				<input :value="data.detailPotensiOp ? data.detailPotensiOp.nama : '-'" class="form-control" disabled>
			</div>
			<div class="col-md-2 pt-1 text-md-end pe-lg-2">NOP</div>
			<div class="col-md col-xl-3 mb-2">
				<input :value="data.detailPotensiOp.nop" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Alamat *</div>
			<div class="col-md-7 col-lg-5  mb-2">
				<input :value="data.detailPotensiOp.alamat" class="form-control" disabled>
			</div>
			<div class="col-md-2 col-xl-1 col-lg-1 pt-1 text-md-end pe-lg-2">RT/RW *</div>
			<div class="col-md col-lg-3 col-xl-2 col-xxl-1 mb-2">
				<input :value="data.detailPotensiOp.rtRw" maxlength="5" class="form-control" disabled>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Kecamatan *</div>
			<div class="col-md mb-2">
				<input class="form-control" disabled :value="data.detailPotensiOp.kecamatan ? data.detailPotensiOp.kecamatan.nama : '-'">
			</div>
			<div class="col-md-2 col-xl-1 pt-1 text-md-end pe-lg-2">Kelurahan *</div>
			<div class="col-md mb-2">
				<input class="form-control" disabled :value="data.detailPotensiOp.kelurahan ? data.detailPotensiOp.kelurahan.nama : '-'">
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Telpon</div>
			<div class="col-md-5 col-lg-4 col-xl-3 mb-2">
				<input :value="data.detailPotensiOp.telp" class="form-control" disabled>
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
					<td><input class="form-control" :value="item.klasifikasi" readonly ></td>
					<td><input class="form-control" :value="item.jumlahOp" readonly ></td>
					<td><input class="form-control" :value="item.unitOp" readonly ></td>
					<td><input class="form-control" :value="item.tarifOp" readonly ></td>
					<td><input class="form-control" :value="item.notes" readonly ></td>
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
				</tr>
			</thead>
			<tbody>
				<tr v-if="data.potensiPemilikWp.length==0"><td class="text-center p-3" colspan="7">tidak ada data</td></tr>
				<tr v-else v-for="(item, idx) in data.potensiPemilikWp" class="fit-form-control">
					<td>
						<input class="form-control" disabled :value="item.nama" >
					</td>
					<td>
						<input class="form-control" disabled :value="item.nik" >
					</td>
					<td>
						<input class="form-control" disabled :value="item.alamat" >
					</td>
					<td>
						<input class="form-control" disabled :value="item.daerah ? item.daerah.nama : '-'">
					</td>
					<td>
						<input class="form-control" disabled :value="item.kelurahan ? item.kelurahan.nama : '-'">
					</td>
					<td>
						<input class="form-control" disabled :value="item.telp" >
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
						<td><input class="form-control" disabled :value="item.direktur_nama" ></td>
						<td><input class="form-control" disabled :value="item.direktur_nik" ></td>
						<td><input class="form-control" disabled :value="item.direktur_alamat" ></td>
						<td>
							<input class="form-control" disabled :value="item.direktur_daerah_id">
						</td>
						<td>
							<input class="form-control" disabled :value="item.direktur_kelurahan_id">
						</td>
						<td><input class="form-control" disabled :value="item.direktur_telp" ></td>
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
				</tr>
			</thead>
			<tbody>
				<tr v-if="!data.potensiNarahubungs || data.potensiNarahubungs.length==0"><td class="text-center p-3" colspan="8">tidak ada data</td></tr>
				<tr v-for="(item, idx) in data.potensiNarahubungs" class="fit-form-control">
					<td>
						<input :value="item.nama" class="form-control" disabled >
					</td>
					<td>
						<input :value="item.nik" class="form-control" disabled >
					</td>
					<td>
						<input :value="item.alamat" class="form-control" disabled >
					</td>
					<td>
						<input :value="item.daerah ? item.daerah.nama : '-'" class="form-control" disabled>
					</td>
					<td>
						<input :value="item.kelurahan ? item.kelurahan.nama : '-'" class="form-control" disabled>
					</td>
 					<td>
						<input :value="item.telp" class="form-control" disabled>
					</td>
					<td>
						<input :value="item.email" class="form-control" disabled>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= $id ?>" />