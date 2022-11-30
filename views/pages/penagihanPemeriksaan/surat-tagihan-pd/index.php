<?php

// $this->params['container_unset'] = true;

$scope = ' Surat Tagihan Pajak Daerah';
$action = 'Daftar';
// $showAdd = true;
// $addUrl = '/penagihan-pemeriksaan/surat-tagihan-pd/tambah';

$titleNav = '<button class="btn bg-orange ms-2"><i class="bi bi-send me-1"></i>Terbitkan</button>';

$file = __DIR__.'/_components/list.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/list/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/list/footer.php');
