<?php

$scope = ' DBKB JPB 2';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/dbkb/non-standar/jpb-2';
$showEdit = true;

$editUrl = '/pendataan/dbkb/non-standar/jpb-2/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
