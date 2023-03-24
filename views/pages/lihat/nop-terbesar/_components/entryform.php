<?php

use yii\web\View;
use app\assets\VueAppAllAsset;

VueAppAllAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/nop-terbesar/entryform.js?v=20221108a');
$this->registerJsFile('@web/js/services/nop-terbesar/entryform.js?v=20221108a');

?>

<div>
	<div class="row mt-2">
		<div class="col-2 text-left">Provinsi</div>
		<div class="col">
			<vueselect v-model="data.provinsi_kode" :options="provinsiList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(data.provinsi_kode, provinsiList, '/daerah?provinsi_kode={kode}&no_pagination=true', daerahList, 'kode', 'kode')" />
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Dati II</div>
		<div class="col">
			<vueselect v-model="data.daerah_kode" :options="daerahList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(data.daerah_kode, daerahList, '/kecamatan?daerah_kode={kode}&no_pagination=true', kecamatanList, 'kode', 'kode')" />
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Kecamatan</div>
		<div class="col">
			<vueselect v-model="data.kecamatan_kode" :options="kecamatanList" :reduce="item => item.kode" label="nama" code="id" @option:selected="refreshSelect(data.kecamatan_kode, kecamatanList, '/kelurahan?kecamatan_kode={kode}&no_pagination=true', kelurahanList, 'kode', 'kode')" />
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Kelurahan</div>
		<div class="col">
			<vueselect v-model="data.kelurahan_kode" :options="kelurahanList" :reduce="item => item.kode" label="nama" code="id" />
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Blok</div>
		<div class="col">
			<input type="text" v-model="data.blok_kode" class="form-control">
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary" @click="onClickSubmit">Submit</button>
		</div>
	</div>
	<hr>

	<div class="row mt-4">
		<div class="col-2 text-left">No Urut</div>
		<div class="col">
			<input type="text" class="form-control" v-model="data.no_urut" readonly>
		</div>
	</div>
</div>