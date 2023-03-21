<?php
$scope = ' Pengurangan PDL';
$action = 'Pengajuan';
$showCancel = null;
$cancelUrl = '/pengurangan/verifikasi-pdl';
$showOK = null;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
