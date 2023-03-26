<?php
use yii\web\View;
use app\assets\VueAppListAsset;

VueAppListAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$this->registerJsFile('@web/js/helper/nop.js?v=20221108a');
$this->registerJsFile('@web/js/services/lihat/sejarah-op/list.js?v=20221108a');
?>

<?php include Yii::getAlias('@vwCompPath/bscope/part-history-op.php'); ?>
<div class="card mb-4">
  <div class="card-body">	
		<ul class="nav nav-tabs mb-4">
			<li class="nav-item">
				<button id="tab-his-op" class="nav-link active" data-bs-toggle="tab" data-bs-target="#content-his-op" type="button" role="tab" aria-controls="content-his-op" aria-selected="true">
					History Objek Pajak
				</button>
			</li>
			<li class="nav-item">
				<button id="tab-his-op-bumi" class="nav-link" data-bs-toggle="tab" data-bs-target="#content-his-op-bumi" type="button" role="tab" aria-controls="content-his-op-bumi" aria-selected="false">
					History Objek Pajak Bumi
				</button>
			</li>
			<li class="nav-item">
				<button id="tab-his-op-bangunan" class="nav-link" data-bs-toggle="tab" data-bs-target="#content-his-op-bangunan" type="button" role="tab" aria-controls="content-his-op-bangunan" aria-selected="false">
					History Objek Pajak Bangunan
				</button>
			</li>
			<li class="nav-item">
				<button id="tab-his-op-individu" class="nav-link" data-bs-toggle="tab" data-bs-target="#content-his-op-individu" type="button" role="tab" aria-controls="content-his-op-individu" aria-selected="false">
					History Nilai Bangunan
				</button>
			</li>
			<li class="nav-item">
				<button id="tab-his-op-anggota" class="nav-link" data-bs-toggle="tab" data-bs-target="#content-his-op-anggota" type="button" role="tab" aria-controls="content-his-op-anggota" aria-selected="false">
					History Objek Pajak Anggota
				</button>
			</li>
		</ul>

		<div class="tab-content">
			<div id="content-his-op" class="tab-pane active" role="tabpanel" aria-labelledby="tab-his-op">
				<?php include __DIR__ . '/table-op.php'; ?>
			</div>
			<div id="content-his-op-bumi" class="tab-pane" role="tabpanel" aria-labelledby="tab-his-op-bumi">
				<?php include __DIR__ . '/table-op-bumi.php'; ?>
			</div>
			<div id="content-his-op-bangunan" class="tab-pane" role="tabpanel" aria-labelledby="tab-his-op-bangunan">
				<?php include __DIR__ . '/table-op-bangunan.php'; ?>
			</div>
			<div id="content-his-op-individu" class="tab-pane" role="tabpanel" aria-labelledby="tab-his-op-individu">
				<?php include __DIR__ . '/table-op-individu.php'; ?>
			</div>
			<div id="content-his-op-anggota" class="tab-pane" role="tabpanel" aria-labelledby="tab-his-op-anggota">
				<?php include __DIR__ . '/table-op-anggota.php'; ?>
			</div>
		</div>
	</div>
</div>
