<?php

$scope = ' Perubahan ZNT Massal';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/pendataan/znt/perubahan-znt-massal';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
