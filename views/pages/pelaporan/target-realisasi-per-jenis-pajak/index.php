<?php

$this->params['container_unset'] = true;

$scope = ' Target dan Realisasi per Jenis Pajak';
$action = 'Pelaporan';
$footerNav = '<a href="/output/pdf/target-realisasi-per-jenis-pajak" target="_blank" class="btn bg-blue ms-2">'
    .'<i class="bi bi-printer"></i> Cetak PDF'
    .'</a>';

$file = __DIR__.'/_components/report.php';
$file_default = Yii::getAlias('@vwCompPath').'/list/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
