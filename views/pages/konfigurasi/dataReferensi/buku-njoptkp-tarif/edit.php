<?php

$scope = ' Buku/NJOPTKP/Tarif';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/konfigurasi/data-referensi/buku-njoptkp-tarif';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
