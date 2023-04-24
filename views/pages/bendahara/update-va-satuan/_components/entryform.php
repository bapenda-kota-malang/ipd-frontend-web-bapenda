<?php

use yii\web\View;
use app\assets\VueAppEntryFormAsset;

VueAppEntryFormAsset::register($this);

$this->registerJsFile('@web/js/services/update-va-satuan/entryform.js?v=20221228a');

?><div class="card mb-3">
	<div class="card-header">Cari / Filter</div>
	<div class="card-body">
		<div class="row mb-2">
			<div class="xc-md-3 xc-lg-2 pt-1">Jenis VA</div>
			<div class="xc-md-5 xc-lg-4 pt-1">
				<div class="form-check form-check-inline">
					<input v-model="mode" :value="'pdl'" class="form-check-input" type="radio" name="mode" id="inlineRadio1" />
					<label class="form-check-label" for="inlineRadio1">PDL</label>
				</div>
				<div class="form-check form-check-inline">
					<input v-model="mode" :value="'pbb'" class="form-check-input" type="radio" name="mode" id="inlineRadio2" />
					<label class="form-check-label" for="inlineRadio2">PBB</label>
				</div>
			</div>
			<div class="xc-md-5 xc-lg-6 text-lg-end pt-1">
				<template v-if="mode=='pdl'">No SPPT/SKPD/ SKPDKB/SKPDKBT</template>
				<template v-else>NOP</template>
			</div>
			<div class="xc-md xc-lg-4 mb-2">
				<input class="form-control" />
			</div>
		</div>
	</div>
</div>
<div class="card mb-3">
	<div class="card-header">Data Pembayaran</div>
	<div v-if="mode=='pdl'" class="card-body">
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">NPWPD</div>
			<div class="xc-md-8 xc-lg-6 xc-xl-4 mb-2">
				<input class="form-control w-lg-50 w-xl-25" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">Jenis Pajak</div>
			<div class="xc-md mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">Nama</div>
			<div class="xc-md xc-md-14 xc-lg-12 xc-xl-10 mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3" pt-1>Alamat</div>
			<div class="xc-md mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row mb-3">
			<div class="xc-md-4 xc-lg-3 pt-1">Kelurahan</div>
			<div class="xc-md mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th>No SPPT/SKPD/SKPDKB/SKPDKBT</th>
					<th>Jatuh Tempo</th>
					<th>Nominal Ketetapan</th>
					<th>Denda</th>
					<th>Jumlah</th>
					<th>Virtual Account</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input class="form-control" disabled /></td>				
					<td><input class="form-control" disabled /></td>				
					<td><input class="form-control" /></td>				
					<td><input class="form-control" /></td>				
					<td><input class="form-control" disabled /></td>				
					<td><input class="form-control" disabled /></td>				
				</tr>
			</tbody>
		</table>
	</div>
	<div v-else class="card-body">
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">NOP</div>
			<div class="xc-md-8 xc-lg-6 xc-xl-4 mb-2">
				<input class="form-control w-lg-50 w-xl-25" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">Letak OP</div>
			<div class="xc-md mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3 pt-1">Nama WP</div>
			<div class="xc-md xc-md-14 xc-lg-12 xc-xl-10 mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row">
			<div class="xc-md-4 xc-lg-3" pt-1>Alamat WP</div>
			<div class="xc-md mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<div class="row mb-4">
			<div class="xc-md-4 xc-lg-3 pt-1" pt-1>Tahun Pajak</div>
			<div class="xc-md-5 xc-lg-4 xc-xl-3 mb-2">
				<input class="form-control" disabled />
			</div>
			<div class="xc-md-20 d-lg-none"></div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end" pt-1>Jatuh Tempo</div>
			<div class="xc-md-5 xc-lg-4 xc-xl-3 mb-2">
				<input class="form-control" disabled />
			</div>
			<div class="xc-md-20 d-lg-none"></div>
			<div class="xc-md-4 xc-lg-3 pt-1 text-lg-end" pt-1>Status Pembayaran</div>
			<div class="xc-md-5 xc-lg-3 mb-2">
				<input class="form-control" disabled />
			</div>
		</div>
		<table class="table fit-form-control">
			<thead>
				<tr>
					<th>PBB yang harus dibayar</th>
					<th>Denda</th>
					<th>Jumlah</th>
					<th>Virtual Account</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><input class="form-control" /></td>				
					<td><input class="form-control" /></td>				
					<td><input class="form-control" disabled /></td>				
					<td><input class="form-control" disabled /></td>				
				</tr>
			</tbody>
		</table>
	</div>
</div>
