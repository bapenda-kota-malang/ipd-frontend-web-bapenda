<?php

use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/dto/esptpd/detail.js?v=20221117a');
$this->registerJsFile('@web/js/services/verifikasi-esptpd/detail.js?v=20221117a');

?>
<div class="card mb-3">
	<div class="card-header">Wajib Pajak / Objek Pajak</div>
	<div class="p-3">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				NPWPD
			</div>
			<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
				<input v-model="data.npwpd.npwpd" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-md-2">
				Tanggal
			</div>
			<div class="xc-md-4 xc-xl-3 mb-2">
				<input :value="data.npwpd.tanggalNpwpd" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Jenis Usaha
			</div>
			<div class="xc-4 xc-lg-2 xc-xl-2 mb-2">
				<input v-model="data.rekening.kode" class="form-control" disabled />
			</div>
			<div class="col col-lg-8 col-xl-7 mb-2">
				<input v-model="data.rekening.jenisUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">
				Nama Usaha
			</div>
			<div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4 mb-2">
				<input v-model="data.objekPajak.nama" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">
				Alamat
			</div>
			<div class="xc-3 pt-2 d-md-none">
				RT/RW
			</div>
			<div class="xc xc-lg-10 mb-2">
				<input v-model="data.objekPajak.alamat" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">
				RT/RW
			</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input v-model="data.objekPajak.rtRw" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">
				Kelurahan
			</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input v-model="data.objekPajak.kelurahan.nama" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">
				Kecamatan
			</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input v-model="data.objekPajak.kecamatan.nama" class="form-control" disabled />
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
			<!-- Header -->
			<div v-if="rekening_objek == '01'" class="row g-1">
				<div class="col-md-3 border-bottom">Golongan Kamar</div>
				<div class="col-md-3 border-bottom">Tarif</div>
				<div class="col-md-3 border-bottom">Jumlah Kamar</div>
				<div class="col-md-3 border-bottom">Kamar yang Laku</div>
			</div>
			<div v-if="rekening_objek == '02'" class="row g-1">
				<div class="col-md-2 border-bottom">Jml Meja</div>
				<div class="col-md-2 border-bottom">Jml Kursi</div>
				<div class="col-md-3 border-bottom">Tarif Minuman</div>
				<div class="col-md-3 border-bottom">Tarif Makakan</div>
				<div class="col-md-2 border-bottom">Jml Pengunjung</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '01'" class="row g-1">
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
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" class="row g-1">
				<div class="col-md-3 border-bottom">Jenis PPJ</div>
				<div class="col-md-3 border-bottom">Jumlah Pelanggan</div>
				<div class="col-md-3 border-bottom">Jumlah Rekening</div>
				<div class="col-md-3 border-bottom">Rarif</div>
			</div>
			<div v-if="rekening_objek == '07'" class="row g-1">
				<div class="col-md-4 border-bottom">Jenis Kendaraan</div>
				<div class="col-md-4 border-bottom">Kapasitas</div>
				<div class="col-md-4 border-bottom">Tarif</div>
			</div>
			<div v-if="rekening_objek == '08'" class="row g-1">
				<div class="col-md-4 border-bottom">Peruntukan</div>
				<div class="col-md-4 border-bottom">Jenis</div>
				<div class="col-md-4 border-bottom">Pengenaan</div>
			</div>
			<!-- Content -->
			<div v-if="rekening_objek == '01'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].golonganKamar" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].tarif" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahKamar" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahKamarYangLaku" type="number" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '02'" class="row g-1">
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahMeja" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahKursi" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails.tarifMinuman" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails.tarifMakanan" type="number" class="form-control" disabled>
				</div>
				<div class="col-md-2">
					<input v-model="data.dataDetails.jumlahPengunjung" type="number" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '03'" class="row g-1">
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekday</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.pengunjungWeekday" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block xc-md-2"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekend</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.pengunjungWeekend" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pertunjukan Weekday</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.pertunjukanWeekday" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block xc-md-2"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pertunjukan Weekend</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.pertunjukanWeekend" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Meja</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.jumlahMeja" class="form-control" />
					</div>
					<div class="d-none d-md-inline-block xc-md-2"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Ruangan</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.jumlahRuangan" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Karcis Bebas</div>
					<div class="xc-md-5 xc-xl-3 mb-2 pt-1">
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="true" class="form-check-input" id="kbYa">
							<label class="form-check-label" for="kbYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="false" class="form-check-input" id="kbTidak">
							<label class="form-check-label" for="kbTidak">Tidak</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block xc-md-2"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Karcis Bebas</div>
					<div class="xc-md-3 mb-2">
						<input v-model="data.dataDetails.jumlahKarcisBebas" class="form-control" />
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Mesin Tiket</div>
					<div class="xc-md-5 xc-xl-3 mb-2">
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="true" class="form-check-input" id="mtYa">
							<label class="form-check-label" for="mtYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="false" class="form-check-input" id="mtTidak">
							<label class="form-check-label" for="mtTidak">Tidak</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block xc-md-2"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pembukuan</div>
					<div class="xc-md-5 pt-1 mb-2">
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="true" class="form-check-input" id="bukuYa">
							<label class="form-check-label" for="bukuYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" v-model="data.dataDetails.karcisBebas" v-bind:value="false" class="form-check-input" id="bukuTidak">
							<label class="form-check-label" for="bukuTidak">Tidak</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jenis Kelas dan Tarif</div>
					<div class="col-md col-lg-6 col-xl-4">
						<table>
							<thead>
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
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '01'" class="row g-1">
				<div class="col-md-3">
					<div class="col-md">
						<input v-model="data.dataDetails.jenisMesinPenggerak" class="form-control" disabled>
					</div>
				</div>
				<div class="col-md-5">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails.tahunMesin" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.dayaMesin" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails.bebanMesin" class="form-control" disabled>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-1">
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahJam" class="form-control" disabled>						
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].jumlahHari" class="form-control" disabled>
						</div>
						<div class="col-md-4">
							<input v-model="data.dataDetails[idx].listrikPLN" class="form-control" disabled>
						</div>
					</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jenisPPJ_id" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahPelanggan" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].jumlahRekening" class="form-control" disabled>
				</div>
				<div class="col-md-3">
					<input v-model="data.dataDetails[idx].tarif" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '07'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].jenisKendaraan" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].kapasitas" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails[idx].tarif" class="form-control" disabled>
				</div>
			</div>
			<div v-if="rekening_objek == '08'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input v-model="data.dataDetails.peruntukan" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.jenisAbt" class="form-control" disabled>
				</div>
				<div class="col-md-4">
					<input v-model="data.dataDetails.pengenaan" class="form-control" disabled>
				</div>
			</div>
		</template>
	</div>
</div>

<div class="card mb-3">
	<div class="card-header">Estimasi Perhitungan</div>
	<div class="p-3">
		<div v-if="!rekening_objek" class="p-3 text-center">
			<i class="bi bi-info-circle"></i> Menunggu informasi jenis pajak...
		</div>
		<div v-else>
		<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Nomor SPT</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input value="otomatis" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-md-2">Billing</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input value="otomatis" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Virtual Account</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input value="otomatis" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Periode Awal</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.periodeAwal" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Periode Awal</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.periodeAkhir" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jatuh Tempo</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input v-model="data.jatuhTempo" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Subtotal E-Tax</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">E-Tax</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Total E-Tax</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Potensi</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.omset" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Tarif Pajak (%)</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input v-model="data.tarifPajak.tarifPersen" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jumlah</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input v-model="data.jumlahPajak" class="form-control" disabled /></div>
			</div>
			<div class="row g-1 mt-2">
				<div class="xc-md-4 xc-lg-2 pt-1">Keterangan</div>
				<div class="xc-md xc-lg-14 xc-lg-12 xc-lg-10 mb-2">
					<textarea class="form-control" disabled></textarea>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card mb-3">
	<div class="card-header">Lampiran</div>
	<div class="p-3">
		<div class="d-flex">
			<div>
				<div class="card p-2">
					<a :href="'/resources/pdf/'+data.attachment">File Lampiran</a>
				</div>
			</div>
		</div>
	</div>
</div>

