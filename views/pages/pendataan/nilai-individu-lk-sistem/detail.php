<?php

$scope = ' Daftar Nilai Individu < Nilai Sistem';
$action = 'Detail';
$showBack = true;
$backUrl = '/pendataan/nilai-individu-lk-sistem';
$showEdit = true;

$editUrl = '/pendataan/nilai-individu-lk-sistem/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
