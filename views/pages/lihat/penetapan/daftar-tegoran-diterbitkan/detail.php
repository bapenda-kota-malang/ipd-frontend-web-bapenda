<?php

$scope = ' Daftar Tegoran Diterbitkan';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/penetapan/daftar-tegoran-diterbitkan';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/penetapan/daftar-tegoran-diterbitkan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
