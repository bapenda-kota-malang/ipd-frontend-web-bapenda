<?php

$this->params['container_unset'] = true;

$scope = ' Jaminan Bongkar Reklame';
$action = 'Daftar';
$showAdd = true;
$addUrl = '/jaminan-bongkar-reklame/tambah';

$titleNav = '<a href="/output/excel/jaminan-bongkar" target="_blank" class="btn bg-green ms-2">'.
      '<i class="bi bi-file-earmark-excel"></i> Output Excel'.
      '</a>';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
