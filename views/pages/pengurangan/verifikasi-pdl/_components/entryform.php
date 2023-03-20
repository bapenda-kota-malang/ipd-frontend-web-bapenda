<?php
use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$paramJobName = Yii::$app->getRequest()->getQueryParam('job_name');
$this->registerJsFile('@web/js/services/pengurangan/entry-verifikasi-pdl.js?v=20221108a');
?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Pengajuan</strong> Pengurangan PDL - NPWPD
		</h5>
    <h5 class="text-capitalize">
      <strong><?=$paramJobName?></strong>
    </h5>
	</div>
  <hr />
</div>

<?php include 'part-form-01.php'; ?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Detail SPTPD/SKPD</strong>
		</h5>
	</div>
  <hr />
</div>

<?php include 'part-form-02.php'; ?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Informasi</strong>
		</h5>
	</div>
  <hr />
</div>

<?php include 'part-form-03.php'; ?>