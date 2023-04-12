<?php

$scope = ' Rincian Wajib Pajak/Objek Pajak';
$action = 'Pelaporan';
$showCetak = true;

$file = __DIR__.'/_components/report.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
