<?php

$scope = ' Peta Kelas Bangunan';
$action = 'Detail';
$showBack = true;
$backUrl = '/peta-pajak/kelas-bangunan';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
