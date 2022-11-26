<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/dto/sts/create.js?v=20221125a');
$this->registerJsFile('@web/js/services/sts/entry.js?v=20221125a');

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
			<div class="col-md-3 xc-lg-3 pt-1 text-md-end pe-md-2">Tgl STS</div>
			<div class="col-md-3 xc-lg-3 mb-2">
				<datepicker v-model="tanggalSts" format="DD/MM/YYYY" @change="checkSspd(this)" />
			</div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end pe-md-2">Ketetapan</div>
			<div class="col-md-5 xc-lg-3 mb-2">
				<select v-model="data.isKetetapan" class="form-control">
					<option :value="true">Ketetapan</option>
					<option :value="false">Non Ketetapan</option>
				</select>
			</div>
		</div>
		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">SKPD</div>
			<div class="col-2 col-md-3 xc-lg-2 col-xxl-1 mb-2">
				<input value="1.20.08" class="form-control" disabled />
			</div>
			<div class="col col-md xc-lg-8 mb-2">
				<input value="Badan Pelayanan Pajak Daerah" class="form-control" disabled />
			</div>
		</div>

		<div class="row g-1">
			<div class="xc-md-4 xc-lg-3 pt-1">Bendahara Penerima</div>
			<div class="col col-md xc-lg-8 mb-2">
				<vueselect v-model="data.bendaharaPenerima_pegawai_id"
					:options="userList"
					:reduce="item => item.id"
					label="nama"
					code="id"
				/>
			</div>
		</div>
		<div class="row g-1 mb-2">
			<div class="xc-md-4 xc-lg-3 pt-1">Keterangan</div>
			<div class="col-md">
				<textarea v-model="data.keterangan" class="form-control"></textarea>
			</div>
		</div>
	</div>
</div>

<div class="card">
	<div class="card-header">
		Detail Surat Tanda Setoran
	</div>
	<div class="card-body">
		<nav>
			<div class="nav nav-tabs" id="nav-tab" role="tablist">
				<button class="nav-link active" id="nav-sts-tab" data-bs-toggle="tab" data-bs-target="#nav-sts" type="button" role="tab" aria-controls="nav-sts" aria-selected="true">Rincian STS</button>
				<button class="nav-link" id="nav-tbp-tab" data-bs-toggle="tab" data-bs-target="#nav-tbp" type="button" role="tab" aria-controls="nav-tbp" aria-selected="false">Rincian TBP</button>
				<button class="nav-link" id="nav-sumber-dana-tab" data-bs-toggle="tab" data-bs-target="#nav-sumber-dana" type="button" role="tab" aria-controls="nav-sumber-dana" aria-selected="false">Sumber Dana</button>
			</div>
		</nav>
		<div id="nav-tabContent" class="tab-content p-3 border border-top-0">
			<div class="tab-pane fade show active" id="nav-sts" role="tabpanel" aria-labelledby="nav-sts-tab" tabindex="0">
				<table class="table">
					<thead>
						<tr>
							<th class="bg-slate-300 fw-600" style="width:50px">No</th>
							<th class="bg-slate-300 fw-600">Kode Akun</th>
							<th class="bg-slate-300 fw-600">Nama Akun</th>
							<th class="bg-slate-300 fw-600">Nominal Bayar</th>
						</tr>
					</thead>
					<tbody>
						<tr v-if="stsList.length == 0"><td colspan="4" class="text-center p3">Tidak Ada Data</td></tr>
						<template v-else v-for="(rek,idx) in stsList">
						<tr>
							<td>-</td>
							<td class="fw-600">{{rek.kode}}</td>
							<td class="fw-600">{{rek.nama}}</td>
							<td class="fw-600">{{rek.nominal}}</td>
						</tr>
						<tr>
							<td></td>
							<td class="bg-slate-100">Nomor TBP</td>
							<td class="bg-slate-100">Nominal</td>
							<td class="bg-slate-100"></td>
						</tr>
						<tr v-for="(sspd,idx) in rek.sspd">
							<td></td>
							<td>{{sspd.nomor}}</td>
							<td>{{sspd.nominal}}</td>
							<td></td>
						</tr>
						</template>
					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="nav-tbp" role="tabpanel" aria-labelledby="nav-tbp-tab" tabindex="0">
				<table class="table">
					<thead>

					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<div class="tab-pane fade" id="nav-sumber-dana" role="tabpanel" aria-labelledby="nav-sumber-dana-tab" tabindex="0">

			</div>
		</div>
	</div>
</div>