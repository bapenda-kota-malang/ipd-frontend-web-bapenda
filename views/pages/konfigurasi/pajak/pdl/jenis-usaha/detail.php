<?php

$scope = ' Jenis Usaha';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/pajak/pdl/jenis-usaha';
$showEdit = true;

$editUrl = '/konfigurasi/pajak/pdl/jenis-usaha/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
