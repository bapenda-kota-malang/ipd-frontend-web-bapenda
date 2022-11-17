<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sspd/list.js?v=20221114a');

?>
<table class="table">
	<thead>
		<th>No.</th>
		<th>NPWP</th>
		<th>Nama WP</th>
		<th>Periode Awal</th>
		<th>Periode Akhir</th>
		<th>Jumlah SKPD</th>
		<th>Tgl Bayar</th>
		<th>Kenaikan</th>
		<th>Pengurang</th>
		<th>Denda</th>
		<th>Bunga</th>
		<th>Total Bayar</th>
		<th>Jenis Usaha</th>
		<th>Nama Petugas</th>
	</thead>
	<tbody>
		<tr v-if="data.length == 0">
			<td colspan="14" class="p-3 text-center">
				Tidak ada data
			</td>
		</tr>
		<tr v-else v-for="item in data">
			<td></td>
			<td>{{item.npwpd.npwpd}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>{{item.tanggalBayar.substr(0,10)}}</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td>{{item.detailTbp[0].nominalBayar}}</td>
			<td>{{item.rekening.jenisUsaha}}</td>
			<td>-</td>
		</tr>
	</tbody>
</table>