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

<div>
	<div class="row g-2">
		<div class="col-6">
			<div class="row">
				<div class="col-3 text-left">NOP</div>
				<div class="col-9">
					<?php
					include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
					?>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Nama Wajib Pajak</div>
				<div class="col">
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Jalan Objek Pajak</div>
				<div class="col">
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Jalan Wajib Pajak</div>
				<div class="col">
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
		</div>
		<div class="col-6">
			<div class="row mt-2">
				<div class="col-3 text-left">Blok Kav No</div>
				<div class="col">
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Blok Kav No</div>
				<div class="col">
					<input type="text" name="" id="" class="form-control">
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary">Cari</button>
		</div>
	</div>
</div>
<hr>

<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Tahun</th>
			<th>Jatuh Tempo</th>
			<th>PBB</th>
			<th>Jumlah Bayar</th>
			<th>Ke</th>
			<th>Tanggal Bayar</th>
			<th>Tanggal Rekam</th>
			<th>Perekam</th>
			<th>Bank</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5">
			<td><input type="checkbox" /></td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
			<td>lorem</td>
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