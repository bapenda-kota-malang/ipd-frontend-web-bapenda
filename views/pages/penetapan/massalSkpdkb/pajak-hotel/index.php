<?php

$this->params['container_unset'] = true;

$scope = ' Pajak Hotel';
$action = 'Daftar';
$showAdd = true;
$showFilter = true;
$addUrl = '/penetapan/massal-skpdkb/pajak-hotel/tambah';
$currentUrl = '/penetapan/massal-skpdkb/pajak-hotel';

$file = __DIR__ . '/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
