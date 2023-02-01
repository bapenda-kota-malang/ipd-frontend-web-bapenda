<?php

$this->params['container_unset'] = true;

$scope = ' Penetapan Masal Pajak Reklame';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/massal-skpdkb/pajak-reklame/tambah';
$currentUrl = '/penetapan/massal-skpdkb/pajak-reklame';
$showFilter = true;

$file = __DIR__ . '/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
