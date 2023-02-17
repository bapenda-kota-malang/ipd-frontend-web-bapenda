<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div>
	<div class="row mt-2">
		<div class="col-2 text-left">Provinsi</div>
		<div class="col">
			<select name="" id="" class="form-control">
				<option value="">Pilih Provinsi</option>
			</select>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Dati II</div>
		<div class="col">
			<select name="" id="" class="form-control">
				<option value="">Pilih Dati II</option>
			</select>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Kecamatan</div>
		<div class="col">
			<select name="" id="" class="form-control">
				<option value="">Pilih Kecamatan</option>
			</select>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Kelurahan</div>
		<div class="col">
			<select name="" id="" class="form-control">
				<option value="">Pilih Kelurahan</option>
			</select>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">Blok</div>
		<div class="col">
			<input type="text" class="form-control">
		</div>
	</div>
	<div class="row mt-2">
		<div class="col-2 text-left">No Urut</div>
		<div class="col">
			<input type="text" class="form-control">
		</div>
	</div>


	<div class="row">
		<div class="col-4">
			<button class="btn btn-block btn-primary">Submit</button>
		</div>
	</div>
</div>