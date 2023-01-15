<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/skpd/entry.js?v=20221114a');
$this->registerJsFile('@web/js/services/skpd/entry.js?v=20221117a');

?>
<div class="card mb-4">
	<div class="card-header">Data SPTPD</div>
	<div class="card-body">
		<div class="row g-1 mb-2">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-8 col-md-3 col-lg-2 col-xl-3 col-xxl-2">
				<input v-model="npwpd" class="form-control" disabled />
			</div>
			<div v-if="!id" class="col"><button @click="showNpwpSearch" class="btn bg-blue"><i class="bi bi-search"></i> Cari NPWPD</button></div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Usaha</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input v-model="kodeRekening" class="form-control" disabled />
			</div>
			<div class="col col-lg-7 col-xl-6 col-xxl-5 mb-2">
				<input v-model="jenisUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nama Usaha</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input v-model="namaUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 mb-2">
				<input v-model="alamatUsaha" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input v-model="rtRwUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Kelurahan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input v-model="kelurahanUsaha" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">Kecamatan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input v-model="kecamatanUsaha" class="form-control" disabled />
			</div>
		</div>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Detail Objek Pajak</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<template v-else>
			<template v-if="rekening_objek == '01'">
				<table class="table fit-form-control">
					<thead>
						<tr>
							<th>Golongan Kamar</th>
							<th>Tarif</th>
							<th>Jumlah Kamar</th>
							<th>Kamar yang Laku</th>
						</tr>
					</thead>
					<tbody>
						<tr v-for="(item, idx) in data.dataDetails">
							<td><input v-model="data.dataDetails[idx].golonganKamar" class="form-control"></td>
							<td><input v-model="data.dataDetails[idx].tarif" type="number" class="form-control"></td>
							<td><input v-model="data.dataDetails[idx].jumlahKamar" type="number" class="form-control"></td>
							<td><input v-model="data.dataDetails[idx].jumlahKamarYangLaku" type="number" class="form-control"></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="rekening_objek == '02'">
				<div class="row g-1">
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1">Jml Meja</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.dataDetails.jumlahMeja" type="number" class="form-control">
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 text-md-end pt-1">Jml Kursi</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.dataDetails.jumlahKursi" type="number" class="form-control">
					</div>
					<div class="d-none d-md-inline-block d-xl-none"></div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-xl-end">Tarif Minuman</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.dataDetails.tarifMinuman" type="number" class="form-control">
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Tarif Makakan</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.dataDetails.tarifMakanan" type="number" class="form-control">
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end">Jml Pengunjung</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input v-model="data.dataDetails.jumlahPengunjung" type="number" class="form-control">
					</div>
				</div>
			</template>
			<template v-else-if="rekening_objek == '03'">
			<div class="row g-0">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekday</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.pengunjungWeekday" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pengunjung Weekend</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.pengunjungWeekend" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekday</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.pertunjukanWeekday" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekend</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.pertunjukanWeekend" class="form-control" />
					</div>
				</div>
				<div class="row g-0">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Meja</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.jumlahMeja" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Ruangan</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.jumlahRuangan" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Karcis Bebas</div>
					<div class="xc-md-3 xc-lg-2 mb-2 pt-1">
						<div class="form-check form-check-inline me-1">
							<input type="radio" name="kbRadio" v-model="data.dataDetails.karcisBebas" v-bind:value="true" class="form-check-input" id="kbYa">
							<label class="form-check-label" for="kbYa">Ya</label>
						</div>
						<div class="form-check form-check-inline me-0">
							<input type="radio" name="kbRadio" v-model="data.dataDetails.karcisBebas" v-bind:value="false" class="form-check-input" id="kbTidak">
							<label class="form-check-label" for="kbTidak">Tidak</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Karcis Bebas</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input v-model="data.dataDetails.jumlahKarcisBebas" class="form-control" />
					</div>
				</div>
				<div class="row g-2">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Mesin Tiket</div>
					<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
						<div class="form-check form-check-inline">
							<input type="radio" name="mtRadio" v-model="data.dataDetails.mesinTiket" v-bind:value="true" class="form-check-input" id="mtYa">
							<label class="form-check-label" for="mtYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="mtRadio" v-model="data.dataDetails.mesinTiket" v-bind:value="false" class="form-check-input" id="mtTidak">
							<label class="form-check-label" for="mtTidak">Tdk</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-2 pt-1 text-xl-end">Pembukuan</div>
					<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
						<div class="form-check form-check-inline">
							<input type="radio" name="bukuRadio" v-model="data.dataDetails.pembukuan" v-bind:value="true" class="form-check-input" id="bukuYa">
							<label class="form-check-label" for="bukuYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="bukuRadio" v-model="data.dataDetails.pembukuan" v-bind:value="false" class="form-check-input" id="bukuTidak">
							<label class="form-check-label" for="bukuTidak">Tidak</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jenis Kelas dan Tarif</div>
					<div class="col-md col-lg-6 col-xl-4">
						<table>
							<thead class="table table-sm fit-form-control">
								<tr>
									<th class="bg-slate-300">Kelas</th>
									<th class="bg-slate-300">Tarif</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(item, idx) in data.dataDetails.kelas">
									<td>
										<input v-model="data.dataDetails.kelas[idx]" class="form-control">
									</td>
									<td>
										<input v-model="data.dataDetails.tarif[idx]" class="form-control">
									</td>
								</tr>
							</tbody>
						</table>
						<button @click="addHiburanClass(data.dataDetails)" class="btn bg-primary">Tambah</button>
					</div>
				</div>
			</template>
			<template v-else-if="rekening_objek == '05' && rekening_rincian == '01'">
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
			<template v-else-if="rekening_objek == '05' && rekening_rincian == '02'">
				<div class="row g-1">
					<div class="col-md-3 border-bottom">Jenis PPJ</div>
					<div class="col-md-3 border-bottom">Jumlah Pelanggan</div>
					<div class="col-md-3 border-bottom">Jumlah Rekening</div>
					<div class="col-md-3 border-bottom">Rarif</div>
				</div>
			</template>
			<template v-else-if="rekening_objek == '07'">
				<div class="row g-1">
					<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
					<div class="col-md-4 border-bottom">Kapasitas</div>
					<div class="col-md-4 border-bottom">Tarif</div>
				</div>
			</template>
			<template v-else-if="rekening_objek == '08'">
				<div class="row g-1">
					<div class="col-md-4 border-bottom">Peruntukan</div>
					<div class="col-md-4 border-bottom">Jenis</div>
					<div class="col-md-4 border-bottom">Pengenaan</div>
				</div>
			</template>
	
			<div v-if="rekening_objek == '03'" class="row g-1">
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '01'" class="row g-1">
				<div class="col-md-3">
					<div class="col-md">
						<input v-model="data.dataDetails.jenisMesinPenggerak" class="form-control">
					</div>
				</div>
				<div class="col-md-5">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails.tahunMesin" class="form-control">
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.dayaMesin" class="form-control">
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.bebanMesin" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahJam" class="form-control">						
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahHari" class="form-control">
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].listrikPLN" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jenisPPJ_id" class="form-control">
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahPelanggan" class="form-control">
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahRekening" class="form-control">
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].tarif" class="form-control">
				</div>
			</div>
			<div v-if="rekening_objek == '07'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].jenisKendaraan" class="form-control">
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].kapasitas" class="form-control">
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].tarif" class="form-control">
				</div>
			</div>
			<div v-if="rekening_objek == '08'" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails.peruntukan" class="form-control">
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.jenisAbt" class="form-control">
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.pengenaan" class="form-control">
				</div>
			</div>
			<div v-if="arrayDetailStatus" class="mt-2">
				<button @click="addDetail(data, rekening_objek, rekening_rincian)" class="btn bg-blue">
					Tambah Data
				</button>
			</div>
		</template>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header">Estimasi Perhitungan Pajak</div>
	<div class="card-body">
		<div v-if="!rekening_objek" class="p-3 text-center" :class="{ 'd-none': !mountedStatus }">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<template v-else>
			<div class="row">
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Nomor SPT</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" value="otomatis" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Billing</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" value="otomatis" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Virtual Account</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" value="otomatis" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Periode Awal</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><datepicker v-model="data.spt.periodeAwal" format="DD/MM/YYYY" /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Periode Akhir</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><datepicker v-model="data.spt.periodeAkhir" format="DD/MM/YYYY" /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Jatuh Tempo</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><datepicker v-model="data.spt.jatuhTempo" format="DD/MM/YYYY" /></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Potensi</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input v-model="data.spt.omset" @change="calculateJumlahPajak()" class="form-control" /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Tarif (%)</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input v-model="data.spt.tarifPajak" class="form-control" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Jumlah Pajak</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input v-model="data.spt.jumlahPajak" class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4">Subtotal E-Tax</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Total E-Tax</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-2 mb-1">
						<div class="pt-1 col-lg-6 col-xl-5 col-xxl-4 text-lg-end">Tax E-Tax</div>
						<div class="col-lg-6 col-xl-7 col-xxl-8 mb-1"><input class="form-control" disabled /></div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-8 col-xl-10 col-xxl-8">
					<div class="row g-0">
						<div class="col-lg-3 col-xl-2 col-xxl-2 ">Keterangan</div>
						<div class="col-lg col-xl-9 col-xxl-8">
							<textarea class="form-control"></textarea>
						</div>
					</div>
				</div>
			</div>
		</template>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Upload Dokumen</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<div v-else>
			<div class="row g-1 mb-3">
				<div class="col-md-3 col-lg-2 pt-1">Lampiran</div>
				<div class="col-md-10 col-xl-8 col-xxl-6 mb-1">
					<input class="form-control" type="file" @change="storeFileToField($event, data.spt, 'lampiran', 'application/pdf')">
					<span class="text-danger" v-if="dataErr['spt.lampiran']">{{dataErr['spt.lampiran']}}</span>
				</div>
			</div>
		</div>
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
							<th>NPWPD</th>
							<th>Nama</th>
							<th>Jenis Usaha</th>
							<th style="width:100px"></th>
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

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
