<?php

$scope = ' Daftar Laporan PPAT';
$action = 'Detail';
$showBack = false;
$backUrl = '/ppat/lap-ppat';
$showEdit = false;

$editUrl = '/ppat/lap-ppat/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
