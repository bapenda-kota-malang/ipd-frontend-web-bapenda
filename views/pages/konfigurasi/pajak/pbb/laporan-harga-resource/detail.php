<?php

$scope = ' Laporan Harga Resource';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/pajak/pbb/laporan-harga-resource';
$showEdit = true;

$editUrl = '/konfigurasi/pajak/pbb/laporan-harga-resource/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
