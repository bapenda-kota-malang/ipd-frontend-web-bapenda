<?php

$scope = ' Buku Rekapitulasi Penerimaan Harian/Bulanan/Tahunan';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/pelaporan/buku-rekap-penerimaan-hbt';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
