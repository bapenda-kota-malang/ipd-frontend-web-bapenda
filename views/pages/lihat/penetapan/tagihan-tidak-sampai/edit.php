<?php

$scope = ' Daftar Tagihan Tidak Sampai';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/lihat/penetapan/tagihan-tidak-sampai';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
