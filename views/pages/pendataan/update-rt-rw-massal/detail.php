<?php

$scope = ' Update RT/RW Massal';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/update-rt-rw-massal';
$showEdit = true;

$editUrl = '/pendataan/update-rt-rw-massal/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
