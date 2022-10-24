<?php

// $this->params['container_unset'] = true;

$scope = ' Rencana Pendataan';
$action = 'Tambah';
$cancelUrl = '/pendataan/obyek-pajak/rencana-pendataan';
$showOK = true;
$showCancel = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = __DIR__.'/_components/entryform_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
