<?php

$this->params['container_unset'] = true;

$scope = ' Penetapan Masal Pajak Penerangan Jalan';
$action = 'Daftar';
$showFilter = true;
$currentUrl = '/penetapan/massal-skpdkb/pajak-penerangan-jalan';

$file = __DIR__ . '/../_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

$jenis_pajak = 'pajak-penerangan-jalan';
$kode_jenis_usaha = '600';
$type = isset($_GET['type']) && $_GET['type'] == 'sa' ? 'sa' : 'oa';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
