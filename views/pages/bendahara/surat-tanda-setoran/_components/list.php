<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sts/list.js?v=20221125a');

?>
<table class="table">
	<thead>
		<th>Nomor STS</th>
		<th>Tgl STS</th>
		<th>Total Setor</th>
		<th>Tgl Setor</th>
		<th>Nama Petugas</th>
		<th>Status</th>
		<th></th>
	</thead>
	<tbody>
		<tr v-if="data.length == 0">
			<td colspan="7" class="p-3 text-center">
				Tidak ada data
			</td>
		</tr>
		<tr v-else v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td>{{item.nomorOutput}}</td>
			<td>{{item.tanggalSts}}</td>
			<td>{{item.nominal}}</td>
			<td>{{item.createdAt}}</td>
			<td>{{item.bendaharaPenerima ? item.bendaharaPenerima.nama : ''}}</td>
			<td>-</td>
		</tr>
	</tbody>
</table>