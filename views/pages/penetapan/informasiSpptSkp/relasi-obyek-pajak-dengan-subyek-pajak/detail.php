<?php

$scope = ' Informasi Relasi Obyek Pajak Dengan Subyek Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/informasi-sppt-skp/relasi-obyek-pajak-dengan-subyek-pajak';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
