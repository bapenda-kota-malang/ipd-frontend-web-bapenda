<?php

$this->params['container_unset'] = true;

$scope = ' OA';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/skpdkb-skpdkbt/oa/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$objekPajak = 'oa';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
