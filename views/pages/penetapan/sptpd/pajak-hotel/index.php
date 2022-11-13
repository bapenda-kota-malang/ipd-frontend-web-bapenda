<?php

$this->params['container_unset'] = true;

$scope = ' SPTPD Pajak Hotel';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/sptpd/pajak-hotel/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$objekPajak = 'pajak-hotel';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
