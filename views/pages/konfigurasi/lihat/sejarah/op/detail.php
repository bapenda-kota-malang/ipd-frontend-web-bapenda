<?php

$scope = ' Sejarah Objek Pajak';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/sejarah/op';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/sejarah/op/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
