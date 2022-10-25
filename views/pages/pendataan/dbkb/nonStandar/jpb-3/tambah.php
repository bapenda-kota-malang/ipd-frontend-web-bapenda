<?php

$scope = ' DBKB JPB 3';
$action = 'Tambah';
$showCancel = true;
$cancelUrl = '/pendataan/dbkb/non-standar/jpb-3';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
