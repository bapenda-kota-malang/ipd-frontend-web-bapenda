<?php

$this->params['container_unset'] = true;

$scope = ' Penetapan Masal Pajak Hotel';
$action = 'Daftar';
$showFilter = true;
$currentUrl = '/penetapan/massal-skpdkb/pajak-hotel';

$file = __DIR__ . '/../_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

$jenis_pajak = 'pajak-hotel';
$kode_jenis_usaha = '211';
$type = isset($_GET['type']) && $_GET['type'] == 'sa' ? 'sa' : 'oa';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
