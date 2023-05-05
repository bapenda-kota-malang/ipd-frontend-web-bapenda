<?php

$this->params['container_unset'] = true;

$scope = ' Penetapan Masal Pajak Hiburan';
$action = 'Daftar';
$showFilter = true;
$currentUrl = '/penetapan/massal-skpdkb/pajak-hiburan';

$file = __DIR__ . '/../_components/list.php';
$file_default = Yii::getAlias('@vwCompPath') . '/list/defaultcontent.php';

$jenis_pajak = 'pajak-hiburan';
$kode_jenis_usaha = '302,310,309,303,308,305,306,312,311,304,307';
$type = isset($_GET['type']) && $_GET['type'] == 'sa' ? 'sa' : 'oa';

include __DIR__ . '/_components/header.php';
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
