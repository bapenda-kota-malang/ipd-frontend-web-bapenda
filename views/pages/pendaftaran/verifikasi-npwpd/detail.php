<?php

$scope = ' Verifikasi Pendaftaran NPWPD';
$action = 'Detail';
$showCancel = true;
$cancelUrl = '/pendaftaran/npwpd';
$showOK = true;
$cancelUrl = '/pendaftaran/verifikasi-npwpd';

$file = __DIR__.'/_components/detail.php';
$file_default = __DIR__.'/_components/entryform_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
