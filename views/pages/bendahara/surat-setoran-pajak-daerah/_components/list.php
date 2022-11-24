<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sspd/list.js?v=20221114a');

?>
<table class="table table-striped table-hover">
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
		<tr v-else v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td></td>
			<td>{{item.npwpd_npwpd}}</td>
			<td v-if="item.objekPajak">{{item.objekPajak.nama}}</td>
			<td v-else>-</td>
			<template v-if="item.sspdDetail && item.sspdDetail[0].spt">
			<td>{{item.sspdDetail[0].spt.periodeAwal.substr(0,10)}}</td>
			<td>{{item.sspdDetail[0].spt.periodeAkhir.substr(0,10)}}</td>
			</template>
			<template v-else>
			<td>-</td>
			<td>-</td>
			</template>
			<td>-</td>
			<td v-if="item.tanggalBayar">{{item.tanggalBayar.substr(0,10)}}</td>
			<td v-else>-</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td v-if="item.sspdDetail">{{item.sspdDetail[0].nominalBayar}}</td>
			<td v-else>-</td>
			<td v-if="item.rekening">{{item.rekening.jenisUsaha}}</td>
			<td v-else>-</td>
			<td v-if="item.user">{{item.user.name}}</td>
			<td v-else>-</td>
		</tr>
	</tbody>
</table>