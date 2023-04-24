<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/objek-bersama/list.js?v=20221108a');

?>

<div class="row">
	<div class="col-12">
		<div class="row mb-4">
			<div class="col-1">NOP</div>
			<div class="col-11 d-flex">
				<?php
				$nopName = 'nopFields';
				include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
				?>

				<button class="btn btn-block btn-primary" @click="onClickBtnCari">Cari</button>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
		<div class="row g-1">
			<div class="col-3 ">Alamat Objek Bersama</div>
			<div class="col mb-2">
				<textarea name="" class="form-control" disabled v-model="data.alamat_objek_bersama"></textarea>
			</div>
		</div>
		<div class="row g-1">
			<div class="col-3 pt-1">Kelurahan</div>
			<div class="col mb-2">
				<select name="" class="form-control" disabled v-model="data.kelurahan.name"></select>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row g-1">
			<div class="col-3 pt-1 pe-lg-2 text-lg-end">Luas Bangungan</div>
			<div class="col-9 mb-2">
				<input class="form-control" disabled v-model="data.luas_bangunan" />
			</div>
		</div>
		<div class="row g-1">
			<div class="col-3 pt-1 pe-lg-2 text-lg-end">Luas Bumi</div>
			<div class="col">
				<input class="form-control" disabled v-model="data.luas_bumi" />
			</div>
		</div>
	</div>
</div>

<hr>

<table class="table custom">
	<thead>
		<tr>
			<th>NOP Anggota</th>
			<th>Nama Wajib Pajak</th>
			<th>L. Bumi Beban</th>
			<th>L. Bangunan Beban</th>
			<th>NJOP</th>
			<th style="width:90px"></th>
		</tr>
	<tbody>
		<tr v-for="item in data.details">
			<td>{{item.nop_anggota}}</td>
			<td>{{item.nama_wajib_pajak}}</td>
			<td>{{item.luas_bumi_beban}}</td>
			<td>{{item.luas_bangunan_beban}}</td>
			<td>{{item.njop}}</td>
		</tr>

		<tr v-if="data.details.length == 0">
			<td colspan="6" class="text-center">Tidak ada data</td>
		</tr>
	</tbody>
	</thead>
</table>