<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$session = Yii::$app->session;
$this->registerJsFile('@web/js/refs/reklame.js?v=20221108a');
$this->registerJsFile('@web/js/services/jambong/list.js?v=20221108a');
?>

<input id="currentUser" value="<?=$session->get('user_id')?>" type="hidden" />
<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>No. Jaminan Bongkar</th>
			<th>No. SKPD</th>
			<th>Nama WP</th>
			<th>Tgl</th>
			<th>Batas Pengambilan</th>
			<th>Jenis Reklame</th>
			<th>Nominal</th>
			<th>Status</th>
			<th>Nama User</th>
			<th>Nama Rekening</th>
			<th style="width:90px"></th>
		</tr>
		<tbody>
			<tr v-for="item in data" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
				<td><input type="checkbox" /></td>
				<td>{{item.nomor}}</td>
				<td>{{item.spt.NomorSpt}}</td>
				<td>{{item.namaWp}}</td>
				<td>{{item.tanggal.substring(0,10)}}</td>
				<td>{{item.TanggalBatas.substring(0,10)}}</td>
				<td>{{item.jenisMasa}}</td>
				<td>{{item.nominal}}</td>
				<td>{{item.spt.statusPenetapan}}</td>
				<td>{{item.namaUser}}</td>
				<td>{{item.namaRekening}}</td>
			</tr>
		</tbody>
	</thead></table>
