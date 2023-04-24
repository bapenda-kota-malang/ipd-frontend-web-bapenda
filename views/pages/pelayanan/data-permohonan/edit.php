<?php

$scope = ' Data Permohonan';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/pelayanan/data-permohonan';
$showOK = true;
$showDownload = true;
$downloadUrl = '/permohonan/download/pdf/$id';

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');

?>
    <input type="hidden" id="id" value="<?= isset($id) ? $id : '' ?>" />
<?
