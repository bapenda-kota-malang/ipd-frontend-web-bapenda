<?php

$this->params['container_unset'] = true;

$scope = ' Buku/NJOPTKP/Tarif';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/data-ref/buku-njoptkp-tarif/tambah';

$file = __DIR__ . '/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
