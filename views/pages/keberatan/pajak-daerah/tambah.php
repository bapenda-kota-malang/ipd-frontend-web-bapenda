<?php
$scope = ' Keberatan Pajak Daerah';
$action = 'Tambah';
$showCancel = null;
$cancelUrl = '/keberatan/pajak-daerah';
$showOK = null;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
