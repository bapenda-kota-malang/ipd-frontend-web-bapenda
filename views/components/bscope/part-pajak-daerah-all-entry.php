
<div class="row mb-2">
	<div class="col d-flex justify-content-between align-items-center mb-2">
		<h5>
			<strong>Pengajuan</strong> <?=$subTitle?> - NPWPD
		</h5>
    <?php if (isset($paramJobName) && $paramJobName != 'input'): ?>
    <h5 class="text-capitalize">
			<strong><?=$paramJobName == 'new' ? 'Baru' : $paramJobName?></strong>
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

<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-verification.php'); ?>

<div class="row p-2 mb-2">
  <div class="col-12 d-flex justify-content-end align-items-center">
    <?php 
      if (!isset($paramJobName) || $paramJobName === 'input') {
        include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-button-02.php');
      } else {
        include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-button-01.php');
      }
    ?>
  </div>
</div>

<?php include Yii::getAlias('@vwCompPath/bscope/part-pajak-daerah-modal-reject.php'); ?>
