<?php

$this->params['container_unset'] = true;

$scope = ' PPAT';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/data-referensi/master-data/ppat/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
