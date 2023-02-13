<?php

$scope = ' Tempat Pembayaran Elektronik';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/pembayaran/tempat-pembayaran-elektronik';
$showEdit = true;

$editUrl = '/konfigurasi/pembayaran/tempat-pembayaran-elektronik/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
