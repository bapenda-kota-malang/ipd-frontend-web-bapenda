<?php

$scope = ' Input SK Pembetulan Kolektif';
$action = 'Detail';
$showBack = true;
$backUrl = '/penetapan/perubahan-sppt-skp/pembetulan/input-kolektif';
$showEdit = true;

$editUrl = '/penetapan/perubahan-sppt-skp/pembetulan/input-kolektif/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
