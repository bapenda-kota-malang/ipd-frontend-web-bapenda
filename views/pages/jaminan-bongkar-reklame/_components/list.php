<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>
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
			<tr>
				<td><input type="checkbox" /></td>
			</tr>
		</tbody>
	</thead></table>
