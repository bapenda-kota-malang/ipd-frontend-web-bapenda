<?php

$scope = ' Laporan Himpunan Ketetapan PBB/NJOP';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/laporan-himpunan-ketetapan-pbb-njop';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
