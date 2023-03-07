<?php

$scope = ' Kantor Lelang';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/master/kantor-lelang';
$showEdit = true;

$editUrl = '/konfigurasi/master/kantor-lelang/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
