<?php

$scope = ' Pajak Hiburan';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/penetapan/sptpd/pajak-hiburan';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

$objekPajak = 'pajak-hiburan';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
