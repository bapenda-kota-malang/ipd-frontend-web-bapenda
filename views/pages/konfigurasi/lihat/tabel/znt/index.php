<?php

$this->params['container_unset'] = true;

$scope = ' ZNT';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/tabel/znt/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
