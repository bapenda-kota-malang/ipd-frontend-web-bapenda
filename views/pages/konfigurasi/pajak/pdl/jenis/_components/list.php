<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

// $this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

// $this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<table class="table custom">
	<thead>
		<tr>
			<th>Kode</th>
			<th>Jenis Pajak</th>
			<th>Kode Rekening</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5">
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
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
	</thead>
</table>