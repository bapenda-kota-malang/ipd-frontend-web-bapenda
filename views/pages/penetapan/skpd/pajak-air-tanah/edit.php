<?php

$scope = ' SKPD Pajak Air Tanah';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/penetapan/skpd/pajak-air-tanah';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

$objekPajak = 'pajak-air-tanah';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
