<?php

$scope = ' Aset Negara Aset Daerah';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/sin/aset-negara-aset-daerah';
$showEdit = true;

$editUrl = '/pendataan/sin/aset-negara-aset-daerah/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
