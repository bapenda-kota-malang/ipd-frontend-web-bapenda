<?php
use yii\web\View;
use app\assets\VueAppEntryFormLegacyAsset;

VueAppEntryFormLegacyAsset::register($this);

$this->registerCssFile('https://unpkg.com/vue2-datepicker/index.css', ["position" => View::POS_HEAD]);
$this->registerJsFile('https://unpkg.com/vue2-datepicker/index.min.js', ["position" => View::POS_HEAD]);

$attachType = 'full';
$paramJobName = Yii::$app->getRequest()->getQueryParam('job_name');
$this->registerJsFile('@web/js/services/keberatan/entry-pajak-daerah.js?v=20221108a');
?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Pengajuan</strong> Keberatan PDL
		</h5>
    <?php if (isset($paramJobName) && $paramJobName != 'input'): ?>
    <h5 class="text-capitalize">
      <strong><?=$paramJobName?></strong>
    </h5>
    <?php endif; ?>
	</div>
  <hr />
</div>

<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-inputform.php'); ?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Detail SPTPD/SKPD</strong>
		</h5>
	</div>
  <hr />
</div>

<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub01.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub02.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub03.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub04.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub05.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub06.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub07.php'); ?>
<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-detail-sub08.php'); ?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Lampiran</strong>
		</h5>
	</div>
  <hr />
</div>

<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-attachment.php'); ?>

<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Verifikator</strong>
		</h5>
	</div>
  <hr />
</div>