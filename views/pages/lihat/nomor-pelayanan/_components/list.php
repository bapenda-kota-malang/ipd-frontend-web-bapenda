<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-2 text-left">NOP</div>
				<div class="col">
					<?php
					include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
					?>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary">Cari</button>
		</div>
	</div>
	<hr>

	<div class="table-responsive">
		<table class="table custom">
			<thead>
				<tr>
					<th>Nomor Pelayanan</th>
					<th>Tahun</th>
					<th>Jenis Pelayanan</th>
				</tr>
			<tbody>
				<tr v-for="(item, index) in 5">
					<td>2023-0001-015</td>
					<td>2022</td>
					<td>09 - Restitusi Dan Kompensasi</td>
				</tr>
			</tbody>
			</thead>
		</table>
	</div>