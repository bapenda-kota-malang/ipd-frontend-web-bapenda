<?php

$scope = ' Mencetak SK Keberatan';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/keberatan/penyelesaian-permohona-keberatan/mencetak-sk-keberatan';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
