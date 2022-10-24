<?php

$scope = ' Catatan Sejarah OP';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/lihat/data-obyek-pajak/catatan-sejarah-op';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
