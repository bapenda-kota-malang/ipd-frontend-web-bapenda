<?php
$this->params['content_fixed'] = true;
$this->params['container_unset'] = null;

$scope = ' SK Keberatan';
$action = 'Cetak / Proses';
$showSearch = false;
$showAdd = null;
$addUrl = '/keberatan/penyelesaian-permohonan/cetak/tambah';
$screenType = 'center';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include $screenType === 'full' ? Yii::getAlias('@vwCompPath/list/header.php') : Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include $screenType === 'full' ? Yii::getAlias('@vwCompPath/list/footer.php') : Yii::getAlias('@vwCompPath/detail/footer.php');
