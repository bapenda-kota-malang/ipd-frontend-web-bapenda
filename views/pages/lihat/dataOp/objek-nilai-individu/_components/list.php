<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/objek-nilai-individu/objek-nilai-individu.js?v=20221108a');
$this->registerJsFile('@web/js/services/objek-nilai-individu/objek-nilai-individu.js?v=20221108a');

?>

<div>
	<div class="row g-2">
		<div class="col-5">
			<div class="row g-1">
				<div class="col-3 text-left">Provinsi</div>
				<div class="col">
					<div class="row">
						<div class="col">
							<vueselect v-model="filter.provinsi_kode" :options="provinsiList" :reduce="item => item.id" label="nama" code="id" @option:selected="refreshSelect(filter.provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
			</div>
			<div class="row g-1 mt-2">
				<div class="col-3 text-left">Dearah</div>
				<div class="col">
					<div class="row">
						<div class="col">
							<vueselect v-model="data.filter.daerah_kode" :options="daerahList" :reduce="item => item.id" label="nama" code="id" @option:selected="refreshSelect(data.filter.daerah_kode, daerahList, '/kecamatan?provinsi_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="row g-1">
				<div class="col-3 text-left">Kecamatan</div>
				<div class="col">
					<div class="row">
						<div class="col-3">
							<input type="number" name="" id="" class="form-control">
						</div>
						<div class="col">
							<input type="text" name="" id="" class="form-control" disabled>
						</div>
					</div>
				</div>
			</div>
			<div class="row g-1 mt-2">
				<div class="col-3 text-left">Kelurahan</div>
				<div class="col">
					<div class="row">
						<div class="col-3">
							<input type="number" name="" id="" class="form-control">
						</div>
						<div class="col">
							<input type="text" name="" id="" class="form-control" disabled>
						</div>
					</div>
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

<div class="row mt-4">
	<div class="col-5">
		<div class="row">
			<div class="col-3 text-left">Cari Blok - NOP</div>
			<div class="col">
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
					<button class="btn btn-outline-secondary" type="button" id="button-addon1">Cari</button>
				</div>

			</div>
		</div>
	</div>
</div>
<hr>

<table class="table custom">
	<thead>
		<tr>
			<th style="width:50px"><input class="form-check-input" type="checkbox" value=""></th>
			<th>Blok NOP</th>
			<th>Letak Objek Pajak / Nama WP</th>
			<th>No. BNG</th>
			<th>Nilai Sistem</th>
			<th>Nilai Individu</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in 5">
			<td><input type="checkbox" /></td>
			<td>lorem</td>
			<td>
				<input type="text" class="form-control mb-2" disabled>
				<input type="text" class="form-control" disabled>
			</td>
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