<?php

$scope = ' Target dan Realisasi per Jenis Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/pelaporan/target-dan-realisasi-per-jenis-pajak';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
