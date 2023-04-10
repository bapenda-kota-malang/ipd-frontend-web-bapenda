<?php
$scope = ' Verikais Pajak Daerah';
$action = 'Detail';
$showCancel = null;
$cancelUrl = '/pengurangan/verifikasi-pdl';
$showOK = null;

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultform.php';

include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
