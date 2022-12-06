<?php

use yii\web\View;
use app\assets\VueAppDetailAsset;

VueAppDetailAsset::register($this);

$this->registerJsFile('@web/js/dto/pengurangan/detail.js?v=20221117a');
$this->registerJsFile('@web/js/services/pengurangan/detail.js?v=20221117a');

?>
<div class="card mb-4">
	<div class="card-header mb-0 fw-600">
		Objek Pajak dan Pemohon
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">NPWPD</div>
			<div class="col-md-4 col-lg-3 col-xl-2 mb-2">
				<input :value="data.spt.npwpd.npwpd" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Nama Usaha</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="data.spt.npwpd.objekPajak ? data.spt.npwpd.objekPajak.nama : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc-3 pt-2 d-md-none">RT/RW</div>
			<div class="xc xc-lg-10 mb-2">
				<input :value="data.spt.npwpd.objekPajak ? data.spt.npwpd.objekPajak.alamat : ''" class="form-control" disabled />
			</div>
			<div class="xc-md-2 xc-xl-2 pt-1 d-none d-md-inline-block pe-2 text-end">RT/RW</div>
			<div class="xc-3 xc-lg-2 xc-xl-2 mb-2">
				<input :value="data.spt.npwpd.objekPajak ? data.spt.npwpd.objekPajak.rtRw : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Pemohon</div>
			<div class="xc-md xc-lg-8 col-xl-6 col-xxl-4 mb-2">
				<input :value="data.pemohon ? data.pemohon.name : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-17 xc-md-4 xc-lg-3 xc-xl-2 pt-2 pt-md-1">Alamat</div>
			<div class="xc xc-lg-10 mb-2">
				<input :value="data.spt.npwpd.objekPajak ? data.spt.npwpd.objekPajak.alamat : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Telpon</div>
			<div class="xc-md xc-lg-6 col-xl-5 col-xxl-4 mb-2">
				<input :value="data.pemohon ? data.pemohon.telp : ''" class="form-control" disabled />
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header mb-0 fw-600">
		Permohonan
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">No Ketetapan</div>
			<div class="xc-md xc-lg-4 col-xl-3 mb-2">
				<input :value="data.spt ? data.spt.NomorSpt : ''" class="form-control" disabled />
			</div>
			<div class="xc-md-4 xc-lg-5 xc-xl-4 pt-2 text-lg-end pe-2">Jumlah Pajak</div>
			<div class="xc-md xc-lg-4 col-xl-3 mb-2">
				<input :value="data.spt ? data.spt.jumlahPajak : ''" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Alasan</div>
			<div class="xc-md xc-lg-12 col-xl-10 mb-2">
				<textarea :value="data.alasanPengurangan" class="form-control" disabled></textarea>
			</div>
		</div>
	</div>
</div>

<div class="card mb-4">
	<div class="card-header mb-0 fw-600">
		Lampiran
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Foto KTP</div>
			<div class="xc-md xc-lg-4 col-xl-3 mb-2">
				<a :href="'/resources/img/' + data.fotoKtp" target="_blank" class="btn btn-outline-primary">File KTP</a>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Lap. Keuangan</div>
			<div class="xc-md xc-lg-5 col-xl-4 mb-2">
				<a :href="'/resources/img/' + data.laporanKeuangan" target="_blank" class="btn btn-outline-primary">File Laporan Keuangan</a>
			</div>
			<div class="xc-md-4 xc-lg-4 xc-xl-3 pt-2">Lap. Pengeluaran</div>
			<div class="xc-md xc-lg-4 col-xl-3 mb-2">
				<a :href="'/resources/img/' + data.laporanPengeluaran" target="_blank" class="btn btn-outline-primary">File Laporan Keuangan</a>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 xc-xl-2 pt-2">Dok. Lainnya</div>
			<div class="xc-md xc-lg-12 col-xl-10 mb-2">
				<a :href="'/resources/img/' + data.dokumenLainnya" target="_blank" class="btn btn-outline-primary">File Lainnya</a>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="id" value="<?= $id ?>" />
