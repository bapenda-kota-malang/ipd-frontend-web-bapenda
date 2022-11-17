<?php

$this->params['container_unset'] = true;

$scope = ' Potensi Objek/Wajib Pajak Baru';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/potensi-owp-baru/tambah';
$showOK = true;

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

// include Yii::getAlias('@vwCompPath/list/header.php');
include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
// include Yii::getAlias('@vwCompPath/detail/footer.php');
include Yii::getAlias('@vwCompPath/detail/footer.php');
