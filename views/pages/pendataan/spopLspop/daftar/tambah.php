<?php

$scope = ' Daftar SPOP/LSPOP';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/pendataan/spop-lspop/daftar';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
