<?php

use yii\web\View;
use app\assets\VueAppListLegacyAsset;

VueAppListLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

// $this->registerCssFile('https://unpkg.com/vue-select@3.20.0/dist/vue-select.css', ["position" => View::POS_HEAD]);
// $this->registerJsFile('https://unpkg.com/vue-select@3.20.0', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/services/jaminan-bongkar/list.js?v=20221108a');

?>

<div class="row g-2">
	<div class="col-12">
		<div class="row">
			<div class="col-2 text-left">NOP Lama</div>
			<div class="col d-flex">
				<?php

				include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
				?>
				<button class="btn btn-primary" @click="getNop">Cari</button>
			</div>
		</div>
		<hr>
	</div>
	<div class="col-6">
		<div class="row my-2">
			<div class="col-2 text-left">NOP Baru</div>
			<div class="col d-flex">
				<?php

				include Yii::getAlias('@vwCompPath/bscope/nop-input.php');
				?>
			</div>
		</div>
		<div class="row my-2">
			<div class="col-2 text-left">Tanggal Pengubah</div>
			<div class="col d-flex">
				<input type="date" class="form-control">
			</div>
		</div>
		<div class="row my-2">
			<div class="col-2 text-left">NIP Pengubah</div>
			<div class="col d-flex">
				<input type="text" class="form-control">
			</div>
		</div>

		<!-- submit -->
		<div class="row my-2">
			<div class="col-2 text-left"></div>
			<div class="col d-flex">
				<button class="btn btn-primary">Simpan</button>
			</div>
		</div>
	</div>