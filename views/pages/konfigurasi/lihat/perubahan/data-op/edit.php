<?php

$scope = ' Daftar Perubahan Data OP';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/lihat/perubahan/data-op';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
