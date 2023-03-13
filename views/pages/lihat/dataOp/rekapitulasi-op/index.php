<?php
$this->params['content_fixed'] = true;
$this->params['container_unset'] = null;

$scope = ' Rekapitulasi OP';
$action = 'Daftar';
$showSearch = false;
$showAdd = null;
$addUrl = '/konfigurasi/lihat/data-op/rekapitulasi-op/tambah';
$screenType = 'center';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include $screenType == 'full' ? Yii::getAlias('@vwCompPath/list/header.php') : Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include $screenType == 'full' ? Yii::getAlias('@vwCompPath/list/footer.php') : Yii::getAlias('@vwCompPath/detail/footer.php');
