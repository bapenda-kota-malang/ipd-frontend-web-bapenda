<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('@web/js/services/sts/list.js?v=20221114a');

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
		<tr v-else v-for="item in data">
			<td></td>
			<td>-</td>
		</tr>
	</tbody>
</table>