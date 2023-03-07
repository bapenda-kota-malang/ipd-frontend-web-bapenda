<?php

use yii\web\View;
use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->registerJsFile('@web/js/dto/sspd/detail.js?v=20221124a');
$this->registerJsFile('@web/js/services/sspd/detail.js?v=20221124a');

?>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">Nomor</div>
	<div class="col-md-3 xc-lg-3 mb-2">
		<input v-model="data.nomorOutput" class="form-control" disabled />
	</div>
	<div class="col-md-3 xc-lg-3 pt-1 text-md-end pe-md-2">Tgl SSPD</div>
	<div class="col-md-3 xc-lg-3 mb-2">
		<input v-model="data.tanggalBayar" class="form-control" disabled />
	</div>
	<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-md-2">Ketetapan</div>
	<div class="col-md-5 xc-lg-3 mb-2">
		<input :value="data.isKetetapan ? 'Ketetapan' : 'Non-Ketetapan'" class="form-control" disabled />
		<!-- <input v-if="data.isKetetapan" v-model="data.tanggalBayar" class="form-control" disabled />
		<input v-model="data.tanggalBayar" class="form-control" disabled />
		<span >Ketetapan</span>
		<span v-else>Non Ketetapan</span> -->
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">SKPD</div>
	<div class="col-2 col-md-3 xc-lg-3 mb-2">
		<input class="form-control" disabled />
	</div>
	<div class="col col-md xc-lg-8 mb-2">
		<input class="form-control" disabled />
	</div>
</div>
<div class="row g-1">
	<div class="xc-md-4 xc-lg-3 pt-1">NPWPD</div>
	<div class="col-8 col-md-4 xc-lg-3 col-lg-2 col-xl-3 col-xxl-2 mb-2">
		<input v-model="data.npwpd_npwpd" class="form-control" disabled />
	</div>
</div>
<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Nama</div>
	<div class="col-md-6 xc-lg-8 col-xxl-5">
		<input v-model="data.objekPajak.nama" class="form-control" disabled />
	</div>
</div>
<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Alamat</div>
	<div class="xc-md-12 xc-lg-11 xc-xl-10">
		<input v-model="data.objekPajak.alamat" class="form-control" disabled />
	</div>
	<div class="col-md-1 xc-lg-2 xc-xl-2 pt-1 text-md-end pe-2">RT/RW</div>
	<div class="col-md-1 xc-lg-2">
		<input v-model="data.objekPajak.rtRw" class="form-control" disabled />
	</div>
</div>

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Keterangan</div>
	<div class="col-md">
		<textarea v-model="data.note" class="form-control" disabled></textarea>
	</div>
</div>

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Akun Bendahara</div>
	<div class="col-2 xc-lg-3">
		<input :value="data.rekening ? data.rekening.kode : '-'" class="form-control" disabled />
	</div>
	<div class="col col-mg-6 xc-lg-8">
		<input :value="data.rekening ? data.rekening.nama : '-'" class="form-control" disabled />
	</div>
</div>

<!-- <div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 col-xl-2 pt-1">Bendahara Penerima</div>
	<div class="col-md-6 xc-lg-8">
		<input v-model="data." class="form-control" />
	</div>
</div> -->

<div class="row g-1 mb-2">
	<div class="xc-md-4 xc-lg-3 pt-1">Tempat Pembayaran</div>
	<div class="col-md-6 xc-lg-8">
		<input v-model="data.tempatPembayaran" class="form-control" disabled />
	</div>
</div>

<div class="row g-1 mb-2 mt-3">
	<div class="xc-md-4 xc-lg-3 pt-1">Detail Pembayaran</div>
	<div class="col-md">
		<table class="table">
			<thead>
				<tr>
					<td class="bg-slate-300">No</td>
					<td class="bg-slate-300">SPTPD/SKPD/SKPDKB</td>
					<td class="bg-slate-300">Jatuh Tempo</td>
					<td class="bg-slate-300">Kode Akun</td>
					<td class="bg-slate-300">Nama Akun</td>
					<td class="bg-slate-300 text-end">Nominal Ketetapan</td>
					<td class="bg-slate-300 text-end">Nominal Bayar</td>
					<td class="bg-slate-300 text-end">Kurang Bayar</td>
					<td class="bg-slate-300 text-end">Denda</td>
				</tr>
			</thead>
			<tbody>
				<tr v-if="!data.sspdDetail">
					<td colspan="9" class="text-center p-3">tidak ada data</td>
				</tr>
				<tr v-else>
					<td class="">1</td>					
					<td class="">{{data.sspdDetail[0].spt ? data.sspdDetail[0].spt.NomorSpt : '-'}}</td>					
					<td class="">{{data.sspdDetail[0].spt ? data.sspdDetail[0].spt.jatuhTempo : '-'}}</td>					
					<td class="">{{data.rekening ? data.rekening.rekeningKode : '-'}}</td>					
					<td class="">{{data.rekening ? data.rekening.nama : '-'}}</td>					
					<td class="text-end">{{data.sspdDetail[0].jumlahPajak}}</td>					
					<td class="text-end">{{data.sspdDetail[0].nominalBayar}}</td>					
					<td class="text-end">{{data.sspdDetail[0].kurangBayar}}</td>
					<td class="text-end">{{data.sspdDetail[0].denda}}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
