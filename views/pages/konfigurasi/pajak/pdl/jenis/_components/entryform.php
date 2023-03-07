<?php

use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerJsFile('@web/js/services/konfigurasi/pajak/pdl/jenis-usaha/entry.js?v=20221117a');

?>

<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="">Kode</label>
			<input type="text" name="" id="" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Jenis Usaha</label>
			<input type="text" name="" id="" class="form-control">
		</div>
		<div class="form-group">
			<label for="">Kode Rekening</label>
			<input type="text" name="" id="" class="form-control">
		</div>
	</div>
</div>