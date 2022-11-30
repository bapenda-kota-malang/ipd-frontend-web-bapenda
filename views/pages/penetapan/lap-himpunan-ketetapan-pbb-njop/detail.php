<?php

$scope = ' Laporan Himpunan Ketetapan PBB/NJOP';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/lap-himpunan-ketetapan-pbb-njop';
$showEdit = true;

$editUrl = '/penetapan/lap-himpunan-ketetapan-pbb-njop/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
