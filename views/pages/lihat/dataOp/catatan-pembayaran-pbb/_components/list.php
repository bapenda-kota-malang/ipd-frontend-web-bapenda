<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/catatan-pembayaran-pbb/list.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-12">
			<div class="row">
				<div class="col-1 text-left">NOP</div>
				<div class="col-9 d-flex">
					<?php
					$nopName = 'nopFields';
					include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
					?>
					<button class="btn btn-primary ml-2" @click="onClickBtnCari">Cari</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row mt-4">
				<div class="col-3 text-left">Nama Wajib Pajak</div>
				<div class="col">
					<input type="text" v-model="data.namaWajibPajak" class="form-control" disabled>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Jalan Objek Pajak</div>
				<div class="col">
					<input type="text" v-model="data.jalanObjekPajak" class="form-control" disabled>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Jalan Wajib Pajak</div>
				<div class="col">
					<input type="text" v-model="data.jalanWajibPajak" class="form-control" disabled>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row mt-2">
				<div class="col-3 text-left">Blok Kav No</div>
				<div class="col">
					<input type="text" v-model="data.blokKavNo" class="form-control" disabled>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Blok Kav No</div>
				<div class="col">
					<input type="text" v-model="data.blokKavNo2" class="form-control" disabled>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>

<table class="table custom">
	<thead>
		<tr>
			<th>Tahun</th>
			<th>Jatuh Tempo</th>
			<th>PBB</th>
			<th>Jumlah Bayar</th>
			<th>Ke</th>
			<th>Tanggal Bayar</th>
			<th>Tanggal Rekam</th>
			<th>Perekam</th>
			<th>Bank</th>
		</tr>
	<tbody>
		<tr v-for="(item, idx) in data.list">
			<td>{{item.tahun}}</td>
			<td>{{item.jatuhTempo}}</td>
			<td>{{item.pbb}}</td>
			<td>{{item.jumlahBayar}}</td>
			<td>{{item.ke}}</td>
			<td>{{item.tanggalBayar}}</td>
			<td>{{item.tanggalRekam}}</td>
			<td>{{item.perekam}}</td>
			<td>{{item.bank}}</td>
		</tr>
	</tbody>
	</thead>
</table>