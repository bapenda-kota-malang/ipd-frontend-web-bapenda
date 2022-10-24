<?php

$scope = ' Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/penetapan/penialaian-dan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal-tahun-sebelumnya';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
