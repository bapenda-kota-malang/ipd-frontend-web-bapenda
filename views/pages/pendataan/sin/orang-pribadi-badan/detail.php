<?php

$scope = ' Orang Pribadi dan Badan';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/sin/orang-pribadi-badan';
$showEdit = true;

$editUrl = '/pendataan/sin/orang-pribadi-badan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
