<?php 

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// include Yii::getAlias('@dummyDataPath').'/pelayanan.php';

$this->registerJsFile('https://unpkg.com/@develoka/angka-rupiah-js/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/bphtb/list_pembayaran.js?v=20221206a');

?>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th class="text-center" style="width:50px">No</th>
			<th>No Pelayanan</th>
			<th>No SSPD</th>
			<th>Nama Wajib Pajak</th>
			<th>NOP Alamat OP</th>
			<th>Jumlah Setor</th>
			<th style="width:120px"></th>
		</tr>
		<tbody>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td class="text-center">{{ item.noUrutItem }}</td>
				<td>{{ item.noPelayanan }}</td>
				<td>{{ item.noDokumen }}</td>
				<td>{{ item.namaWp }} </td>
				<td>{{ item.opAlamat }}</td>
				<td>{{ item.jumlahSetor }}</td>
				<td class="text-end">
					<div class="btn-group">
						<a class="dropdown-item" :href="'/bendahara/pembayaran-bphtb/'+ item.id +'/edit'"><i class="bi bi-pencil me-2"></i> Lihat</a>
					</div>
				</td>
			</tr>
		</tbody>
	</thead>
</table>

