<?php

$scope = ' Laporan Harga Resource';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/data-ref/resource/lap-harga-resource';
$showEdit = true;

$editUrl = '/konfigurasi/data-ref/resource/lap-harga-resource/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
