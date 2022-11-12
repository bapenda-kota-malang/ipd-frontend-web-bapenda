<?php

// $this->params['container_unset'] = true;

$scope = ' Pengajuan ESPTPD Pajak Air Tanah';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/verifikasi-e-sptpd/pajak-air-tanah/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$objekPajak = 'pajak-air-tanah';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
