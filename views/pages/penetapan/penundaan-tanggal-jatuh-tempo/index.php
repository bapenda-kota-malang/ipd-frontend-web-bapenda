<?php

$this->params['container_unset'] = true;

$scope = ' Penundaan Tanggal Jatuh Tempo';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/penundaan-tanggal-jatuh-tempo/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
