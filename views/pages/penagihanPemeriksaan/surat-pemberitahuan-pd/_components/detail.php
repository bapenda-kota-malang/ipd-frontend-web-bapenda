<?php

use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->registerJsFile('@web/js/refs/penagihanStatusCode.js?v=20221117a');
$this->registerJsFile('@web/js/dto/surat-tagihan-pd/detail.js?v=20221202a');
$this->registerJsFile('@web/js/services/surat-tagihan-pd/detail.js?v=20221202a');

?>

<div class="card mb-4">
	<div class="card-header fw-600">Data Undangan</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Tgl Teguran</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="data.tanggal" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-md-3 col-lg-2 mb-2">
				<input :value="data.npwpd.npwpd" class="form-control" disabled />
			</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="data.npwpd.objekPajak.nama" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 xc-xl-9 xc-xxl-8 mb-2">
				<input :value="data.npwpd.objekPajak.alamat" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="data.npwpd.objekPajak.rtRw" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Kelurahan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6 mb-2">
				<input :value="data.npwpd.objekPajak.kelurahan ? data.npwpd.objekPajak.kelurahan.nama : ''" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1 pe-2 text-md-end">Kecamatan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6 mb-2">
				<input :value="data.npwpd.objekPajak.kecamatan ? data.npwpd.objekPajak.kecamatan.nama : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-1">Dasar Pengenaan</div>
			<div class="xc-md-6 col-lg-7 col-xl-6">
				<input class="form-control" disabled />
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header fw-600">
		Rinciang Tunggakan
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Masa Pajak</th>
					<th>Jatuh Tempo</th>
					<th>SKPD</th>
					<th class="text-end" style="width:110px;">Ketetapan</th>
					<th class="text-end" style="width:80px;">Denda</th>
					<th class="text-end" style="width:110px;">Telah Dibayar</th>
					<th class="text-end" style="width:110px;">Sisa Pajak Terhutang</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, idx) in data.suratPemberitahuanDetail">
					<td>{{ idx + 1 }}</td>
					<td>{{ item.spt.periode }}</td>
					<td>{{ item.spt.jatuhTempo }}</td>
					<td>{{ item.spt.nomor }}</td>
					<td class="text-end">{{ item.spt.jumlahPajak }}</td>
					<td class="text-end">{{ item.nominalDenda }}</td>
					<td class="text-end">{{ '' }}</td>
					<td class="text-end">{{ item.jumlahPajak }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div id="terbitModal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<div>Terbitkan</div>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="mb">Proses akan menandai Surat Pemberitahuan telah terbit.</div>
				<div>Lanjutkan Proses?</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				<button @click="submitTerbit" type="button" class="btn bg-blue">Ya, Lanjut</button>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
