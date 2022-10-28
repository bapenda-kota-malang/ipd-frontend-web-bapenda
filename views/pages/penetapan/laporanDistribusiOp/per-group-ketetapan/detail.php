<?php

$scope = ' OP Per Group Ketetapan';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/laporan-distribusi-op/per-group-ketetapan';
$showEdit = true;

$editUrl = '/penetapan/laporan-distribusi-op/per-group-ketetapan/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
