<?php

$this->params['container_unset'] = true;

$scope = ' Laporan Himpunan Ketetapan PBB/NJOP';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/penetapan/lap-himpunan-ketetapan-pbb-njop/tambah';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
