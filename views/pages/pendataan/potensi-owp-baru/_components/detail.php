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
			<div class="xc-md-4 xc-lg-3 pt-2 mb-2 fw-600">
				{{data.genset ? "Ya" : "Tidak"}}
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 mb-md-2 pt-2 text-md-end pe-md-2">Air Tanah</div>
			<div class="xc-md-4 xc-xl-3 mb-2 pt-2 fw-600">
				{{data.airTanah ? "Ya" : "Tidak"}}
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
		<div v-if="!jenisOp" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<template v-else>
			<template v-if="jenisOp=='01'">
				<table class="table fit-form-control">
					<thead>
						<tr>
							<th>Jenis Kamar</th>
							<th>Jumlah Kamar</th>
							<th>Tarif</th>
							<th>Kapasitas</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, idx) in data.detailPajaks">
							<td><input :value="item.jenisFasilitas" class="form-control" disabled /></td>
							<td><input :value="item.jumlahFasilitas" type="number" class="form-control" disabled /></td>
							<td><input :value="item.tarifFasilitas" type="number" class="form-control" disabled /></td>
							<td><input :value="item.kapasitas" type="number" class="form-control" disabled /></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="jenisOp=='02'">
				<div class="row g-1">
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1">Jml Meja</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.detailPajaks.jumlahMeja" type="number" class="form-control" disabled />
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 text-md-end pt-1">Jml Kursi</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.detailPajaks.jumlahKursi" type="number" class="form-control" disabled />
					</div>
					<div class="d-none d-md-inline-block d-xl-none"></div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-xl-end">Tarif Minuman</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.detailPajaks.tarifMinuman" type="number" class="form-control" disabled />
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Tarif Makakan</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.detailPajaks.tarifMakanan" type="number" class="form-control" disabled />
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Jml Pengunjung</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.detailPajaks.jumlahPengunjung" type="number" class="form-control" disabled />
					</div>
				</div>
			</template>
			<template v-else-if="jenisOp=='03' && rincian=='07'">
				<table class="table fit-form-control">
					<thead>
						<tr>
							<th>Jenis Ruangan</th>
							<th>Jumlah Ruangan</th>
							<th>Tarif/Jam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="form-control"></td>
							<td><input class="form-control"></td>
							<td><input class="form-control"></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="jenisOp=='03' && rincian=='16'">
				<div class="row">
					<div class="col-md-4 col-lg-3 col-xl-2 pt-1">Jumlah Ruangan / Kamar</div>
					<div class="col-md-3 col-lg-2"><input type="text" class="form-control"></div>
				</div>
				<table class="table fit-form-control">
					<thead>
						<tr>
							<th>Klasifikasi</th>
							<th>Tarif/Jam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="form-control"></td>
							<td><input class="form-control"></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="jenisOp=='03'">
				<div class="row">
					<div class="col-md-4 col-lg-3 col-xl-2 pt-1">Jumlah Ruangan / Kamar</div>
					<div class="col-md-3 col-lg-2"><input type="text" class="form-control"></div>
				</div>
				<table class="table fit-form-control">
					<thead>
						<tr>
							<th>Klasifikasi</th>
							<th>Tarif/Jam</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input class="form-control"></td>
							<td><input class="form-control"></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="jenisOp=='05' && rekening_rincian == '01'">
				<div class="row g-1">
					<div class="row g-0">
						<div class="col-md-3">
							<div class="col-md border-bottom">Jenis Mesin Penggerak</div>
						</div>
						<div class="col-md-5">
							<div class="row g-1">
								<div class="col-md-4 border-bottom">Tahun Mesin</div>
								<div class="col-md-4 border-bottom">Daya Mesin</div>
								<div class="col-md-4 border-bottom">Beban Mesin</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="row g-1">
								<div class="col-md-4 border-bottom">Jumlah Jam</div>
								<div class="col-md-4 border-bottom">Jumlah Hari</div>
								<div class="col-md-4 border-bottom">Listrik PLN</div>
							</div>
						</div>
					</div>
				</div>
			</template>
			<template v-else-if="jenisOp=='05' && rekening_rincian == '02'">
				<div class="row g-1">
					<div class="col-md-3 border-bottom">Jenis PPJ</div>
					<div class="col-md-3 border-bottom">Jumlah Pelanggan</div>
					<div class="col-md-3 border-bottom">Jumlah Rekening</div>
					<div class="col-md-3 border-bottom">Rarif</div>
				</div>
			</template>
			<template v-else-if="jenisOp=='07'">
				<div class="row g-1">
					<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
					<div class="col-md-4 border-bottom">Kapasitas</div>
					<div class="col-md-4 border-bottom">Tarif</div>
				</div>
			</template>
			<template v-else-if="jenisOp=='08'">
				<div class="row g-1">
					<div class="col-md-4 border-bottom">Peruntukan</div>
					<div class="col-md-4 border-bottom">Jenis</div>
					<div class="col-md-4 border-bottom">Pengenaan</div>
				</div>
			</template>

			<div v-if="jenisOp=='05' && rekening_rincian == '01'" class="row g-1">
				<div class="col-md-3">
					<div class="col-md">
						<input v-model="data.detailPajaks.jenisMesinPenggerak" class="form-control" disabled />
					</div>
				</div>
				<div class="col-md-5">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.detailPajaks.tahunMesin" class="form-control" disabled />
						</div>
						<div class="col-md-4">
							<input v-model="data.detailPajaks.dayaMesin" class="form-control" disabled />
						</div>
						<div class="col-md-4">
							<input v-model="data.detailPajaks.bebanMesin" class="form-control" disabled />
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.detailPajaks[idx].jumlahJam" class="form-control" disabled />						
						</div>
						<div class="col-md-4">
							<input v-model="data.detailPajaks[idx].jumlahHari" class="form-control" disabled />
						</div>
						<div class="col-md-4">
							<input v-model="data.detailPajaks[idx].listrikPLN" class="form-control" disabled />
						</div>
					</div>
				</div>
			</div>
			<div v-if="jenisOp=='05' && rekening_rincian == '02'" v-for="(item, idx) in data.detailPajaks" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.detailPajaks[idx].jenisPPJ_id" class="form-control" disabled />
				</div>
				<div class="col-md-3">
					<input v-model="data.detailPajaks[idx].jumlahPelanggan" class="form-control" disabled />
				</div>
				<div class="col-md-3">
					<input v-model="data.detailPajaks[idx].jumlahRekening" class="form-control" disabled />
				</div>
				<div class="col-md-3">
					<input v-model="data.detailPajaks[idx].tarif" class="form-control" disabled />
				</div>
			</div>
			<div v-if="jenisOp=='07'" v-for="(item, idx) in data.detailPajaks" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.detailPajaks[idx].jenisKendaraan" class="form-control" disabled />
				</div>
				<div class="col-md-4">
					<input v-model="data.detailPajaks[idx].kapasitas" class="form-control" disabled />
				</div>
				<div class="col-md-4">
					<input v-model="data.detailPajaks[idx].tarif" class="form-control" disabled />
				</div>
			</div>
			<div v-if="jenisOp=='08'" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.detailPajaks.peruntukan" class="form-control" disabled />
				</div>
				<div class="col-md-4">
					<input v-model="data.detailPajaks.jenisAbt" class="form-control" disabled />
				</div>
				<div class="col-md-4">
					<input v-model="data.detailPajaks.pengenaan" class="form-control" disabled />
				</div>
			</div>
			<div v-if="arrayDetailStatus" class="mt-2">
				<button @click="addDetailObjekPajak()" class="btn bg-blue">
					Tambah Data
				</button>
			</div>
		</template>
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
				<tr v-if="(data.bapl.length>0) && data.bapl[0].petugas && (data.bapl[0].petugas.length>0)" v-for="(item, idx) in data.bapl[0].petugas">
					<td class="text-center pt-1">{{idx +1}}</td>
					<td>{{item.nama}}</td>
					<td>{{item.nip}}</td>
					<td>{{item.jabatan_id}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= $id ?>" />
