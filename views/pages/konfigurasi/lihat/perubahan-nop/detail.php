<?php

$scope = ' Perubahan NOP';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/perubahan-nop';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
