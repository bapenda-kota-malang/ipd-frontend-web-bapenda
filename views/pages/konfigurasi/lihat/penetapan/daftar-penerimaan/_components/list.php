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
				<div class="col-3 text-left">Provinsi</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Provinsi</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Kota / Kodya</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Kota / Kodya</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Kecamatan</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Kecamatan</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Kelurahan</div>
				<div class="col">
					<select class="form-control">
						<option value="">Pilih Kelurahan</option>
					</select>
				</div>
			</div>
			<div class="row mt-2">
				<div class="col-3 text-left">Blok NOP</div>
				<div class="col">
					<input type="text" class="form-control" />
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
			<th>Blok NOP</th>
			<th>Letak Objek Pajak <br /> Nama Wajib Pajak</th>
			<th>Tahun Pajak <br /> Jatuh Tempo</th>
			<th>Denda <br /> Tanggal Bayar</th>
			<th>PBB Harus Dibayar <br /> Penerimaan</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5">
			<td><input type="checkbox" /></td>
			<td>lorem</td>
			<td>lorem <br /> lorem</td>
			<td>lorem <br /> lorem</td>
			<td>lorem <br /> lorem</td>
			<td>lorem <br /> lorem</td>
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