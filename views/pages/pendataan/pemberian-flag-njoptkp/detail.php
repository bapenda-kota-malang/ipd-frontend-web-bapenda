<?php

$scope = ' Pemberian Flag NJOPTKP';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/pemberian-flag-njoptkp';
$showOK = true;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
