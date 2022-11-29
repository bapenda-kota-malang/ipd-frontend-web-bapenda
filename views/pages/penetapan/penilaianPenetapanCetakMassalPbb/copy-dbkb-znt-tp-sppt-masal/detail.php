<?php

$scope = ' Copy DBKB. ZNT. TP SPPT Masal Tahun Sebelumnya';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal';
$showEdit = true;

$editUrl = '/penetapan/penilaian-penetapan-cetak-massal-pbb/copy-dbkb-znt-tp-sppt-masal/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
