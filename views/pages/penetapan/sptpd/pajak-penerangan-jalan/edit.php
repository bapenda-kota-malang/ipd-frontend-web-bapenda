<?php

$scope = ' SPTPD Pajak Penerangan Jalan';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/penetapan/sptpd/pajak-penerangan-jalan';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

$objekPajak = 'pajak-penerangan-jalan';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
