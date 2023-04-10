<?php

use yii\web\View;
use app\assets\VueAppDetailLegacyAsset;

VueAppDetailLegacyAsset::register($this);

$this->registerJsFile('@web/js/dto/sts/detail.js?v=20221124a');
$this->registerJsFile('@web/js/services/sts/detail.js?v=20221125a');

?>
<div class="card mb-4">
	<div class="card-header">
		Detail
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">Nama</div>
			<div class="col-md-3 xc-lg-3 mb-2">
				<input :value="data.nomorOutput" class="form-control" disabled />
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">Alamat</div>
			<div class="col col-md xc-lg-8 mb-2">
				<input :value="data.bendaharaPenerima ? data.bendaharaPenerima.nama : '-'" class="form-control" disabled />
			</div>
		</div>

		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">NPWP</div>
			<div class="col col-md xc-lg-8 mb-2">
				<input :value="data.bendaharaPenerima ? data.bendaharaPenerima.nama : '-'" class="form-control" disabled />
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		Laporan Penerbitan Akta oleh PPAT/PPATS/Notaris dan Pejabat Lelang
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr class="text-center">
					<th class="bg-slate-300 fw-600" style="width:50px" rowspan="2">No</th>
					<th class="bg-slate-300 fw-600" colspan="2">Akta</th>
					<th class="bg-slate-300 fw-600" rowspan="2">Letak Tanah</th>
					<th class="bg-slate-300 fw-600" colspan="2">Luas</th>
					<th class="bg-slate-300 fw-600" colspan="2">Luas</th>
					<th class="bg-slate-300 fw-600" rowspan="2">Harga Transaksi Pengalihan Hak</th>
					<th class="bg-slate-300 fw-600" colspan="2">Nama, Alamat, dan NPWP</th>
					<th class="bg-slate-300 fw-600" colspan="2">SSP</th>
					<th class="bg-slate-300 fw-600" rowspan="2">Bentuk Pembuatan atau Hukum</th>
					<th class="bg-slate-300 fw-600" rowspan="2">Jenis dan No. Hak</th>
					<th class="bg-slate-300 fw-600" colspan="3">SSPD-BPHTB</th>
				</tr>
				<tr>
					<th class="bg-slate-100 fw-600">No</th>
					<th class="bg-slate-100 fw-600">Tgl</th>
					<th class="bg-slate-100 fw-600">Tanah</th>
					<th class="bg-slate-100 fw-600">Bgn</th>
					<th class="bg-slate-100 fw-600">NOP/Th</th>
					<th class="bg-slate-100 fw-600">NJOP(Rp)</th>
					<th class="bg-slate-100 fw-600">Pihak Yang Mengalihkan</th>
					<th class="bg-slate-100 fw-600">Pihak Yang Menerima</th>
					<th class="bg-slate-100 fw-600">Tgl</th>
					<th class="bg-slate-100 fw-600">Rp</th>
					<th class="bg-slate-100 fw-600">No</th>
					<th class="bg-slate-100 fw-600">Tgl</th>
					<th class="bg-slate-100 fw-600">Rp</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="stsList.length == 0">
					<td colspan="18" class="text-center p3">Tidak Ada Data</td>
				</tr>
				<template v-else v-for="(rek,idx) in stsList">
					<tr>
						<td></td>
						<td class="bg-slate-100">Nomor TBP</td>
						<td class="bg-slate-100">Nominal</td>
						<td class="bg-slate-100"></td>
					</tr>
				</template>
			</tbody>
		</table>
	</div>
</div>

<input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />