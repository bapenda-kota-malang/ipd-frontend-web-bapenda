<?php

$this->params['container_unset'] = true;

$scope = ' Input SK Pembatalan Kolektif';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/pembatalan-sppt-skp/input-sk-pembatalan-kolektif/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
