<?php

$this->params['container_unset'] = true;

$scope = ' SKPD Pajak Resto';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/skpd/pajak-resto/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$objekPajak = 'pajak-resto';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
