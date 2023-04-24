<?php

$scope = ' Daftar Tagihan Tidak Sampai';
$action = 'Detail';
$showBack = true;
$backUrl = '/konfigurasi/lihat/penetapan/tagihan-tidak-sampai';
$showEdit = true;

$editUrl = '/konfigurasi/lihat/penetapan/tagihan-tidak-sampai/'.$id.'/edit';
$file = __DIR__.'/_components/detail.php';
$file_default = Yii::getAlias('@vwCompPath').'/detail/defaultcontent.php';

include Yii::getAlias('@vwCompPath/detail/header.php');
include file_exists($file) ? $file : $file_default;
include Yii::getAlias('@vwCompPath/detail/footer.php');
