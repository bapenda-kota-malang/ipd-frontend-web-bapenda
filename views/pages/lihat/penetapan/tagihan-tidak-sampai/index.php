<?php

$this->params['container_unset'] = true;

$scope = ' Daftar Tagihan Tidak Sampai';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/konfigurasi/lihat/penetapan/tagihan-tidak-sampai/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
