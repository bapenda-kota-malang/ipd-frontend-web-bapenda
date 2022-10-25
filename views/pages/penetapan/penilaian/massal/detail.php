<?php

$scope = ' Penilaian Massal';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/penilaian/massal';
$showEdit = true;

$editUrl = '/penetapan/penilaian/massal/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
