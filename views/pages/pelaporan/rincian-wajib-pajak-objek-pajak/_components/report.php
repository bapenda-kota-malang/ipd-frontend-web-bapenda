<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/pelaporan/rincian-wajib-pajak-objek-pajak/print.js?v=20221108a');
$this->registerJsFile('@web/js/services/pelaporan/rincian-wajib-pajak-objek-pajak/print.js?v=20221108a');

?>
<div class="card mb-4">
	<div class="card-body">
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Tanggal Awal</div>
			<div class="col-md col-lg-4 mb-2">
				<datepicker v-model="data.tanggalAwal" format="DD/MM/YYYY" />
			</div>
			<div class="col-md-3 col-xl-2 pt-1 text-lg-end pe-lg-3">Tanggal Akhir</div>
			<div class="col-md mb-2">
				<datepicker v-model="data.tanggalAkhir" format="DD/MM/YYYY" />
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">NPWPD</div>
			<div class="col-md col-lg-4 mb-2">
                <vueselect v-model="data.npwpd" :options="npwpdList" :reduce="item => item.id" label="nama" code="id" placeholder=".. Pilih .."></vueselect>
			</div>
			<div class="col-md-3 col-xl-2 pt-1 text-lg-end pe-lg-3">Golongan</div>
			<div class="col-md mb-2">
			<vueselect v-model="data.golongan" :options="golonganList" label="golongan" placeholder=".. Pilih .."></vueselect>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-md-2 col-xl-1 pt-1">Pajak</div>
			<div class="col-md col-lg-4 mb-2">
				<vueselect v-model="data.pajak" :options="pajakList" :reduce="item => item.id" label="nama" code="id" placeholder=".. Pilih .."></vueselect>
			</div>
		</div>
	</div>
</div>
