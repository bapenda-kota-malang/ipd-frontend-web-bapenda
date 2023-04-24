<?php

$scope = ' Cetak Massal SPPT PBB';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/cetak-massal-sppt';
$showEdit = true;
$editUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/cetak-massal-sppt/'.$id.'/edit';
$showDownload = true;
$downloadUrl = "/output/pdf/pbb-cetak-massal";

$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
