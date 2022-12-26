<?php

$scope = ' Daftar Referensi Bank';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/data-ref/master/referensi-bank';
$showEdit = true;

$editUrl = '/konfigurasi/data-ref/master/referensi-bank/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
