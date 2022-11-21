<?php

$scope = ' SPTPD Pajak Hotel';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/sptpd/pajak-hotel';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

$objekPajak = 'pajak-hotel';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
