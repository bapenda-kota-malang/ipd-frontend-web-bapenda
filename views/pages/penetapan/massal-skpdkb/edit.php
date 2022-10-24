<?php

$scope = ' Penetapan Massal Surat Ketetapan Pajak Daerah/ Surat Ketetapan Pajak Daerah Kurang Bayar';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/penetapan/massal-skpdkb';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = __DIR__.'/_components/entryform_default.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
