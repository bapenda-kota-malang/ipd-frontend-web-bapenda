<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/sts/create.js?v=20221108a');
$this->registerJsFile('@web/js/services/sts/entry.js?v=20221108b');

?><div class="card mb-4">
	<div class="card-header">
		Data Surat Tanda Setoran
	</div>
	<div class="card-body">
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">Nomor</div>
			<div class="col-md-3 xc-lg-3 mb-2">
				<input value="auto" class="form-control" disabled />
			</div>
			<div class="col-md-3 xc-lg-3 pt-1 text-md-end pe-md-2">Tgl SSPD</div>
			<div class="col-md-3 xc-lg-3 mb-2">
				<datepicker v-model="data.tanggalBayar" format="DD/MM/YYYY" />
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-md-2">Ketetapan</div>
			<div class="col-md-5 xc-lg-3 mb-2">
				<select v-model="data.isKetetapan" class="form-control">
					<option :value="true">Ketetapan</option>
					<option :value="false">Non Ketetapan</option>
				</select>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md-4 xc-lg-3 pt-1">Keterangan</div>
			<div class="col-md">
				<textarea v-model="data.note" class="form-control"></textarea>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		Detail Surat Tanda Setoran
	</div>
	<div class="card-body">
		<table class="table">
			<thead>
				<tr>
					<th class="bg-slate" colspan="2">Rincian STS</th>
					<th class="bg-slate" style="width:32%">Rincian TBP</th>
					<th class="bg-slate" style="width:32%">Sumber Dana</th>
				</tr>
				<tr>
					<th class="bg-slate-300" style="width:50px">No</th>
					<th class="bg-slate-300">Kode Akun</th>
					<th class="bg-slate-300">Nama Akun</th>
					<th class="bg-slate-300">Nominal Bayar</th>
				</tr>
			</thead>
		</table>
	</div>
</div>