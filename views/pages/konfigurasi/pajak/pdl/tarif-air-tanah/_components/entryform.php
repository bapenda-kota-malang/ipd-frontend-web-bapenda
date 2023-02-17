<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/konfigurasi/pajak/pdl/jenis-usaha/entry.js?v=20221117a');

?>
<div class="row">
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Jenis Tarif</label>
			<select name="" id="" class="form-control">
				<option value="">Pilih Jenis Tarif</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Batas Bawah</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Batas Atas</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Tarif Mata Air</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Tarif Bukan Mata Air</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
</div>