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

<div class="row g-2">
	<div class="col-5">
		<div class="row g-1">
			<div class="col-3 text-left">NOP</div>
			<div class="col-9">
				<?php
				include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
				?>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-3 text-left">Alamat Objek Bersama</div>
			<div class="col">
				<textarea name="" class="form-control"></textarea>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-3 text-left">Kelurahan</div>
			<div class="col">
				<select name="" class="form-control"></select>
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-3 text-left">Kelurahan</div>
			<div class="col">
				<select name="" class="form-control"></select>
			</div>
		</div>
	</div>
	<div class="col-5">
		<div class="row g-1">
			<div class="col-3 text-left">Luas Bangungan</div>
			<div class="col-9">
				<input class="form-control" />
			</div>
		</div>
		<div class="row g-1 mt-2">
			<div class="col-3 text-left">Luas Bumi</div>
			<div class="col">
				<input class="form-control" />
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-5">
		<button class="btn btn-block btn-primary">Cari</button>
	</div>
</div>

<hr>

<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>NOP Anggota</th>
			<th>Nama Wajib Pajak</th>
			<th>L. Bumi Beban</th>
			<th>L. Bangunan Beban</th>
			<th>NJOP</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5" @click="goTo(urls.pathname + '/' + item.id, $event)" class="pointer">
			<td><input type="checkbox" /></td>
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