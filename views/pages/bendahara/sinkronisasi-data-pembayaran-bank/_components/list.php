<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/sspd/list.js?v=20221124a');

?>
<table class="table table-striped table-hover">
	<thead>
		<th>No.</th>
		<th>Tanggal Sinkronisasi</th>
		<th>Nama Petugas</th>
		<th></th>
	</thead>
	<tbody>
		<!-- <tr v-if="data.length == 0">
			<td colspan="4" class="p-3 text-center">
				Tidak ada data
			</td>
		</tr>
		<tr v-else v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer"> -->
		<td>3121</td>
		<td>DD - MM - YYYY </td>
		<td>Nama Petugas</td>
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
		<!-- </tr> -->
	</tbody>
</table>