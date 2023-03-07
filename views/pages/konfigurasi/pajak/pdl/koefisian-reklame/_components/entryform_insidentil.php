<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/konfigurasi/pajak/pdl/jenis-usaha/entry.js?v=20221117a');

?>
<div class="row">
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Jenis Reklame</label>
			<select name="" id="" class="form-control">
				<option value="">Pilih Jenis Reklame</option>
			</select>
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Dasar Pengeluaran</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Masa Pajak</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
	<div class="col-lg-6 mt-2">
		<div class="form-group">
			<label for="">Pajak</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
</div>