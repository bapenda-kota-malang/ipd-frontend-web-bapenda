<?php

$scope = ' Proses SK Pembatalan Tunggal';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/pembatalan-sppt-skp/proses-sk-pembatalan-tunggal';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
