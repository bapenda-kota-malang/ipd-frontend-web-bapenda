<?php

$scope = ' Ringkasan Bulanan Transaksi PPAT';
$action = 'Detail';
$showBack = true;
$backUrl = '/ppat/ringkasan-bulanan-transaksi-ppat';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
