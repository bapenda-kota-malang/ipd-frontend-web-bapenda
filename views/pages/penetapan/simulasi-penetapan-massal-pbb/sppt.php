<?php

$scope = ' SPPT';
$action = 'Detail';
// $showCancel = true;
// $cancelUrl = '/penetapan/simulasi-penetapan-massal-pbb/tambah';
// $showOK = true;

$file = __DIR__.'/_components/sppt.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
