<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/catatan-sejarah-wp/list.js?v=20221108a');

?>

<div>
	<div class="row">
		<div class="col-1 text-left">NOP</div>
		<div class="col-11 d-flex">
			<?php
			$nopName = 'nopFields';
			include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
			?>
			<button class="btn btn-block btn-primary" @click="onClickBtnCari">Cari</button>
		</div>
	</div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row mt-2">
				<div class="col-3 text-left">Alamat Wajib Pajak</div>
				<div class="col">
					<input type="text" v-model="data.alamatObjekPajak" class="form-control" disabled>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Kelurahan</div>
				<div class="col">
					<input type="text" v-model="data.kelurahan" class="form-control" disabled>
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row mt-2">
				<div class="col-3 text-left">RT / RW</div>
				<div class="col">
					<input type="text" v-model="data.rt_rw" class="form-control" disabled>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Luas Tanah</div>
				<div class="col">
					<input type="text" v-model="data.luasTanah" class="form-control" disabled>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>

<table class="table custom">
	<thead>
		<tr>
			<th>Tahun Pajak</th>
			<th>Tanggal Cetak</th>
			<th>Tanggal Terbit</th>
			<th>Tanggal Jatuh Tempo</th>
			<th>Nama Wajib Pajak</th>
			<th>Alamat Wajib Pajak</th>
		</tr>
	<tbody>
		<tr v-for="(item, idx) in data.list" :key="idx">
			<td>{{item.tahunPajak}}</td>
			<td>{{item.tanggalCetak}}</td>
			<td>{{item.tanggalJatuhTempo}}</td>
			<td>{{item.tanggalTerbit}}</td>
			<td>{{item.namaWajibPajak}}</td>
			<td>{{item.alamatWajibPajak}}</td>
		</tr>
	</tbody>
	</thead>
</table>