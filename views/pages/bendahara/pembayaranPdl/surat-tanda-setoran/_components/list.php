<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/sts/list.js?v=20221125a');

?>
<table class="table">
	<thead>
		<th>Nomor STS</th>
		<th>Tanggal STS</th>
		<th>Total Setor</th>
		<th>Nama Petugas</th>
		<th>Status</th>
		<th>Tanggal Setor</th>
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
			<td>{{item.bendaharaPenerima ? item.bendaharaPenerima.nama : ''}}</td>
			<td>-</td>
			<td>{{item.createdAt}}</td>
			<td>
				<div class="btn-group">
					<button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
						Aksi
					</button>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Detail</a></li>
						<li><a class="dropdown-item" href="#">Edit</a></li>
						<li><a class="dropdown-item" href="#">Hapus</a></li>
					</ul>
				</div>
			</td>
		</tr>
	</tbody>
</table>