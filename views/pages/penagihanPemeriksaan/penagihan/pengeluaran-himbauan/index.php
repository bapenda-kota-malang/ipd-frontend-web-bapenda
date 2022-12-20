<?php

// $this->params['container_unset'] = true;

$scope = ' Pengeluaran Himbauan';
$action = 'Daftar';
$showAdd = false;
$showCetak = true;
$showCancel = true;
$cancelUrl = '/penagihan-pemeriksaan/penagihan/pengeluaran-himbauan';

$file = __DIR__.'/_components/himbauan.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
