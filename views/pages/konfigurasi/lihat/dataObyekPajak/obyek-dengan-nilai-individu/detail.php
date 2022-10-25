<?php

$scope = ' Daftar Obyek Dengan Nilai Individu';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/data-obyek-pajak/obyek-dengan-nilai-individu';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/data-obyek-pajak/obyek-dengan-nilai-individu/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
