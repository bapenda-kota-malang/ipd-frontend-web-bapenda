<?php

$scope = ' Harga Referensi';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/harga-referensi';
$showEdit = true;

$editUrl = '/pendataan/harga-referensi/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
