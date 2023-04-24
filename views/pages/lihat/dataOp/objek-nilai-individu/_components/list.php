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
							<vueselect v-model="filter.provinsi_kode" :options="provinsiList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(filter.provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
			</div>
			<div class="row g-1 mt-2">
				<div class="col-3 text-left">Dearah</div>
				<div class="col">
					<div class="row">
						<div class="col">
							<vueselect v-model="filter.daerah_kode" :options="daerahList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(filter.daerah_kode, daerahList, '/kecamatan?daerah_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode')" />
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
						<div class="col">
							<vueselect v-model="filter.kecamatan_kode" :options="kecamatanList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(filter.kecamatan_kode, kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahanList, 'kode', 'kode')" />
						</div>
					</div>
				</div>
			</div>
			<div class="row g-1 mt-2">
				<div class="col-3 text-left">Kelurahan</div>
				<div class="col">
					<div class="row">
						<div class="col">
							<vueselect v-model="filter.kelurahan_kode" :options="kelurahanList" :reduce="item => item.kode" label="nama" code="id" />
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary" @click="onClickFilterSearch">Cari</button>
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
			<th>Blok NOP</th>
			<th>Letak Objek Pajak / Nama WP</th>
			<th>No. BNG</th>
			<th>Nilai Sistem</th>
			<th>Nilai Individu</th>
		</tr>
	<tbody>
		<tr v-for="(item, idx) in data">
			<td>{{item.blok_nop}}</td>
			<td>
				{{item.letak_objek_pajak}} <br />
				{{item.nama_wp}}
			</td>
			<td>{{item.no_bng}}</td>
			<td>{{item.nilai_sistem}}</td>
			<td>{{item.nilai_individu}}</td>
		</tr>
	</tbody>
	</thead>
</table>