<?php

$scope = ' Daftar OP tanpa Peta';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/data-op/op-tanpa-peta';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/data-op/op-tanpa-peta/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
