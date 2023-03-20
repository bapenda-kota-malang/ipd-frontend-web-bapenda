<?php

use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/bphtb/list_pembayaran.js?v=20230306a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:50px">No</th>
			<th>No Pelayanan</th>
			<th>No SSPD</th>
			<th>Nama WP</th>
			<th>Alamat OP</th>
			<th>Jumlah Setor</th>
			<th>Tanggal</th>
			<th style="width:80px"></th>
		</tr>
	<tbody>
		<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td class="text-center">{{ item.noUrutItem }}</td>
			<td>{{ item.noPelayanan }}</td>
			<td>{{ item.noDokumen }}</td>
			<td>{{ item.namaWp }} </td>
			<td>{{ item.opAlamat }}</td>
			<td>{{ item.nominalBayar }}</td>
			<td>{{ item.tglBayar }}</td>
			<td class="text-end">
				<div class="btn-group">
					<a class="dropdown-item" :href="'/bendahara/pembayaran-bphtb/'+ item.id +'/edit'"><i class="bi bi-pencil me-2"></i> Lihat</a>
				</div>
			</td>
		</tr>
	</tbody>
	</thead>
</table>