<?php

$this->params['container_unset'] = true;

$scope = ' Laporan Harga Resource';
$action = '';
$showAdd = true;
$addUrl = '/konfigurasi/pajak/pbb/laporan-harga-resource/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include __DIR__.'/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
