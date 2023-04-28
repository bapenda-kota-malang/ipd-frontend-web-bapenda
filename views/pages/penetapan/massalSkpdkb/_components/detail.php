<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.0.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.0.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/skpd/detail.js?v=20221117a');
if ($type == 'oa') {
	$this->registerJsFile('@web/js/services/massal-skpdkb/oa/detail.js?v=20230426a');
} else if ($type == 'sa') {
	$this->registerJsFile('@web/js/services/massal-skpdkb/sa/detail.js?v=20230426a');
}

?>
<div class="card mb-4">
	<div class="card-header">Data SKPD</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
				<input :value="data.npwpd?.npwpd" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Jenis Usaha</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="data.rekening?.kode" class="form-control" disabled />
			</div>
			<div class="col col-lg-7 col-xl-6 col-xxl-5 mb-2">
				<input :value="data.rekening?.jenisUsaha" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nama Usaha</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="data.objekPajak?.nama" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 mb-2">
				<input :value="data.objekPajak?.alamat" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="data.objekPajak?.rtRw" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Kelurahan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input :value="data.objekPajak?.kelurahan?.nama" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">Kecamatan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input :value="data.objekPajak?.kecamatan?.nama" class="form-control" disabled />
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
						<tr v-for="(item, idx) in data.detailSptHotel">
							<td><input :value="item.golonganKamar" class="form-control" disabled></td>
							<td><input :value="item.tarif" class="form-control" disabled></td>
							<td><input :value="item.jumlahKamar" class="form-control" disabled></td>
							<td><input :value="item.jumlahKamarYangLaku" class="form-control" disabled></td>
						</tr>
					</tbody>
				</table>
			</template>
			<template v-else-if="rekening_objek == '02'">
				<div class="row g-1">
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1">Jml Meja</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input :value="data.detailSptResto?.jumlahMeja" class="form-control" disabled>
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 text-md-end pt-1 pe-2">Jml Kursi</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input :value="data.detailSptResto?.jumlahKursi" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none"></div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-xl-end pe-2">Tarif Minuman</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input :value="data.detailSptResto?.tarifMinuman" class="form-control" disabled>
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-2">Tarif Makakan</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input :value="data.detailSptResto?.tarifMakanan" class="form-control" disabled>
					</div>
					<div class="col-4 col-md-2 xc-lg-3 xc-xl-2 pt-1 text-md-end pe-2">Jml Pengunjung</div>
					<div class="col-6 col-md-2 xc-lg-3 xc-xl-2">
						<input :value="data.detailSptResto?.jumlahPengunjung" class="form-control" disabled>
					</div>
				</div>
			</template>
			<template v-else-if="rekening_objek == '03'">
				<div class="row g-0">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Pengunjung Weekday</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.pengunjungWeekday" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pengunjung Weekend</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.pengunjungWeekend" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekday</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.pertunjukanWeekday" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Pertunjukan Weekend</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.pertunjukanWeekend" class="form-control" disabled>
					</div>
				</div>
				<div class="row g-0">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jumlah Meja</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.jumlahMeja" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Ruangan</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.jumlahRuangan" class="form-control" disabled>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-2 xc-lg-4"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Karcis Bebas</div>
					<div class="xc-md-3 xc-lg-2 mb-2 pt-1">
						<div class="form-check form-check-inline me-1">
							<input type="radio" name="kbRadio" :value="data.detailSptHiburan?.karcisBebas" v-bind:value="true" class="form-check-input" id="kbYa" disabled>
							<label class="form-check-label" for="kbYa">Ya</label>
						</div>
						<div class="form-check form-check-inline me-0">
							<input type="radio" name="kbRadio" :value="data.detailSptHiburan?.karcisBebas" v-bind:value="false" class="form-check-input" id="kbTidak" disabled>
							<label class="form-check-label" for="kbTidak">Tidak</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1 text-xl-end pe-2">Jumlah Karcis Bebas</div>
					<div class="xc-md-3 xc-lg-2 mb-2">
						<input :value="data.detailSptHiburan?.jumlahKarcisBebas" class="form-control" disabled>
					</div>
				</div>
				<div class="row g-2">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Mesin Tiket</div>
					<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
						<div class="form-check form-check-inline">
							<input type="radio" name="mtRadio" :value="data.detailSptHiburan?.mesinTiket" v-bind:value="true" class="form-check-input" id="mtYa" disabled>
							<label class="form-check-label" for="mtYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="mtRadio" :value="data.detailSptHiburan?.mesinTiket" v-bind:value="false" class="form-check-input" id="mtTidak" disabled>
							<label class="form-check-label" for="mtTidak">Tdk</label>
						</div>
					</div>
					<div class="d-none d-md-inline-block d-xl-none xc-md-1 xc-lg-2 xc-xl-3"></div>
					<div class="xc-md-5 xc-lg-4 xc-xl-2 pt-1 text-xl-end">Pembukuan</div>
					<div class="xc-md-3 xc-lg-2 xc-xl-3 mb-2 pt-1">
						<div class="form-check form-check-inline">
							<input type="radio" name="bukuRadio" :value="data.detailSptHiburan?.pembukuan" v-bind:value="true" class="form-check-input" id="bukuYa" disabled>
							<label class="form-check-label" for="bukuYa">Ya</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" name="bukuRadio" :value="data.detailSptHiburan?.pembukuan" v-bind:value="false" class="form-check-input" id="bukuTidak" disabled>
							<label class="form-check-label" for="bukuTidak">Tidak</label>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="xc-md-5 xc-lg-4 xc-xl-3 pt-1">Jenis Kelas dan Tarif</div>
					<div class="col-md col-lg-6 col-xl-4">
						<table class="table table-sm fit-form-control">
							<thead>
								<tr>
									<th class="bg-slate-300">Kelas</th>
									<th class="bg-slate-300">Tarif</th>
								</tr>
							</thead>
							<tbody>
								<tr v-for="(item, idx) in data.detailSptHiburan?.kelas">
									<td><input :value="data.detailSptHiburan?.kelas[idx]" class="form-control" disabled></td>
									<td><input :value="data.detailSptHiburan?.tarif[idx]" class="form-control" disabled></td>
								</tr>
							</tbody>
						</table>
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
						<input :value="data.dataDetails?.jenisMesinPenggerak" class="form-control">
					</div>
				</div>
				<div class="col-md-5">
					<div class="row g-1">
						<div class="col-md-4">
							<input :value="data.dataDetails?.tahunMesin" class="form-control">
						</div>
						<div class="col-md-4">
							<input :value="data.dataDetails?.dayaMesin" class="form-control">
						</div>
						<div class="col-md-4">
							<input :value="data.dataDetails?.bebanMesin" class="form-control">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="row g-1">
						<div class="col-md-4">
							<input :value="data.dataDetails[idx].jumlahJam" class="form-control">
						</div>
						<div class="col-md-4">
							<input :value="data.dataDetails[idx].jumlahHari" class="form-control">
						</div>
						<div class="col-md-4">
							<input :value="data.dataDetails[idx].listrikPLN" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div v-if="rekening_objek == '05' && rekening_rincian == '02'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-3">
					<input :value="data.dataDetails[idx].jenisPPJ_id" class="form-control">
				</div>
				<div class="col-md-3">
					<input :value="data.dataDetails[idx].jumlahPelanggan" class="form-control">
				</div>
				<div class="col-md-3">
					<input :value="data.dataDetails[idx].jumlahRekening" class="form-control">
				</div>
				<div class="col-md-3">
					<input :value="data.dataDetails[idx].tarif" class="form-control">
				</div>
			</div>
			<div v-if="rekening_objek == '07'" v-for="(item, idx) in data.dataDetails" class="row g-1">
				<div class="col-md-4">
					<input :value="data.dataDetails[idx].jenisKendaraan" class="form-control">
				</div>
				<div class="col-md-4">
					<input :value="data.dataDetails[idx].kapasitas" class="form-control">
				</div>
				<div class="col-md-4">
					<input :value="data.dataDetails[idx].tarif" class="form-control">
				</div>
			</div>
			<div v-if="rekening_objek == '08'" class="row g-1">
				<div class="col-md-4">
					<input :value="data.dataDetails?.peruntukan" class="form-control">
				</div>
				<div class="col-md-4">
					<input :value="data.dataDetails?.jenisAbt" class="form-control">
				</div>
				<div class="col-md-4">
					<input :value="data.dataDetails?.pengenaan" class="form-control">
				</div>
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
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Nomor SPT</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.nomorSpt" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-md-2">Billing</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.kodeBilling" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Virtual Account</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input value="otomatis" class="form-control" disabled /></div>
			</div>
			<div class="row g-1">
				<div class="xc-md-4 xc-lg-2 pt-1">Periode Awal</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.periodeAwal" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Periode Awal</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.periodeAkhir" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jatuh Tempo</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input :value="data.jatuhTempo" class="form-control" disabled /></div>
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
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.omset" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-md-end pe-2">Tarif Pajak (%)</div>
				<div class="xc-md-6 xc-lg-4 mb-2"><input :value="data.tarifPajak?.tarifPersen" class="form-control" disabled /></div>
				<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-2">Jumlah</div>
				<div class="xc-md-6 xc-lg-4 xc-lg-3 mb-3"><input :value="data.jumlahPajak" class="form-control" disabled /></div>
			</div>
			<div class="row g-1 mt-2">
				<div class="xc-md-4 xc-lg-2 pt-1">Keterangan</div>
				<div class="xc-md xc-lg-14 xc-lg-12 xc-lg-10 mb-2">
					<textarea class="form-control" disabled></textarea>
				</div>
			</div>
		</template>
	</div>
</div>

<input type="hidden" id="objekPajak" value="<?= $objekPajak ?>" />
<input type="hidden" id="id" value="<?= $id ?>" />