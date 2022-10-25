<?php

$scope = ' Input SK Pembetulan Kolektif';
$action = 'Edit';
$showCancel = true;
$cancelUrl = '/penetapan/perubahan-sppt-skp/pembetulan/input-sk-pembetulan-kolektif';
$showOK = true;

$file = __DIR__.'/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
