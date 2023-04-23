<?php

$this->params['container_unset'] = true;

$scope = ' Kelas Tanah';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/pendataan/kelas-tanah/tambah';
$showSearch = false;

$showFilter = true;

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

$titleNav = 
    '<a href="/output/excel/kelas-tanah" target="_blank" class="btn bg-green ms-2">'.
        '<i class="bi bi-file-earmark-excel"></i> Output Excel'.
    '</a>';
    
include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
