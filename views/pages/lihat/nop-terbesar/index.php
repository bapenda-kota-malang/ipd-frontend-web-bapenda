<?php

$this->params['container_unset'] = true;

$scope = ' NOP Terbesar';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/nop-terbesar/tambah';

$file = __DIR__ . '/_components/entryform.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
