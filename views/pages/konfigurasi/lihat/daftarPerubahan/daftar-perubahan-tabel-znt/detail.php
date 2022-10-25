<?php

$scope = ' Daftar Perubahan Tabel ZNT';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/daftar-perubahan/daftar-perubahan-tabel-znt';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
