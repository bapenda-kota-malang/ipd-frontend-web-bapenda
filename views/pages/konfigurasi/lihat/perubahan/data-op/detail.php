<?php

$scope = ' Daftar Perubahan Data OP';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/perubahan/data-op';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/perubahan/data-op/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
