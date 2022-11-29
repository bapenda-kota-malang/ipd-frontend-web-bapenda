<?php

$this->params['container_unset'] = true;

$scope = ' Informasi Relasi Obyek Pajak Dengan Subyek Pajak';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/info-sppt-skp/relasi-op-sp/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
