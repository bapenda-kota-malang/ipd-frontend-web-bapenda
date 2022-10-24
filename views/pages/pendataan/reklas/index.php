<?php

// $this->params['container_unset'] = true;

$scope = ' Reklasifikasi Tanah';
$action = 'Proses';
$cancelUrl = '/pendataan/reklas';
$showOK = true;
$showCancel = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = __DIR__.'/_components/entryform_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
