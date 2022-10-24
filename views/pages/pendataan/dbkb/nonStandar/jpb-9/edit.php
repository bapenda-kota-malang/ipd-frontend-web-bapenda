<?php

$scope = ' DBKB JPB 9';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/pendataan/dbkb/non-standar/jpb-9';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

?>

<?php include Yii::getAlias('@vwCompPath/detail/header.php'); ?>
<?php include file_exists($file) ? $file : $file_default; ?>
<?php include Yii::getAlias('@vwCompPath/detail/footer.php'); ?>
