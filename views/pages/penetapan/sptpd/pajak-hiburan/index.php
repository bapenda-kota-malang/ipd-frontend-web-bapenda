<?php

$this->params['container_unset'] = true;

$scope = ' Pajak Hiburan';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/sptpd/pajak-hiburan/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
