<?php
$scope = ' Pengurangan Pajak Daerah';
$action = 'Detail';
$showCancel = null;
$cancelUrl = '/pengurangan/pajak-daerah';
$showOK = null;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
