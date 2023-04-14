<?php
$this->params['content_fixed'] = true;
$this->params['container_unset'] = null;

$scope = ' Rincian Wajib Pajak/Objek Pajak';
$action = 'Daftar';
$showAdd = null;
$addUrl = '/pelaporan/rincian-wajib-pajak-objek-pajak/tambah';
$showBack = null;
$backUrl = '/';
$showEdit = null;
$screenType = 'center';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include $screenType == 'full' ? Yii::getAlias('@vwCompPath/list/header.php') : Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include $screenType == 'full' ? Yii::getAlias('@vwCompPath/list/footer.php') : Yii::getAlias('@vwCompPath/detail/footer.php');
