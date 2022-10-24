<?php

$scope = ' Daftar PBB Lebih atau Kurang Bayar';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/informasi-sppt-skp/daftar-pbb-lebih-atau-kurang-bayar';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
