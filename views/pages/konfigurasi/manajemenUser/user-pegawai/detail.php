<?php

$scope = ' User Pegawai';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/manajemen-user/user-pegawai';
$showEdit = true;

$editUrl = '/konfigurasi/manajemen-user/user-pegawai/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
